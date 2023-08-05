<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function articles(ArticlesRepositoryContract $articlesRepositoryContract): View
    {
        $articles = $articlesRepositoryContract->findAll();
        return view('pages.admin.admin_articles', ['articles' => $articles]);
    }

    public function articleCreate(): View
    {
        return view('pages.admin.admin_article_create');
    }

    public function articleCreateRequest(ArticleRequest                  $request,
                                         TagsRequest                     $tagsRequest,
                                         ArticlesRepositoryContract      $articlesRepositoryContract,
                                         TagsSynchronizerServiceContract $tagsSynchronizerServiceContract,
                                         ImagesServiceContract           $imagesServiceContract
    ): RedirectResponse
    {
        $data = $request->only(['slug', 'title', 'description', 'body', 'image', 'published_at', 'tags']);

        try {
            $articlesRepositoryContract->findBySlug($data['slug']);
            return back()->with('error_message', ['Запись с таким slug уже существует']);
        } catch (\Exception $exception) {
        }

        try {
            if (!empty($data['image'])) {
                $image = $imagesServiceContract->createImage($data['image']);
                $data['image_id'] = $image->id;
            }
            $article = $articlesRepositoryContract->create($data);
            $tagsSynchronizerServiceContract->sync($article, $tagsRequest->get('tags'));
            return back()->with('success_message', ['Запись успешно создана']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не создана']);
        }
    }

    public function articleEdit($slug, ArticlesRepositoryContract $articlesRepositoryContract): View
    {
        $article = $articlesRepositoryContract->findBySlug($slug);
        return view('pages.admin.admin_article_edit', ['article' => $article]);
    }

    public function articleEditRequest(ArticleRequest                  $request,
                                       TagsRequest                     $tagsRequest,
                                                                       $slug,
                                       ArticlesRepositoryContract      $articlesRepositoryContract,
                                       TagsSynchronizerServiceContract $tagsSynchronizerServiceContract,
                                       ImagesServiceContract           $imagesServiceContract
    ): RedirectResponse
    {
        $data = $request->only(['title', 'description', 'body', 'image', 'published_at', 'tags']);
        $id = $articlesRepositoryContract->findBySlug($slug)->id;
        try {
            $oldImageId = null;
            $article = $articlesRepositoryContract->findById($id);
            if (!empty($data['image'])) {
                $image = $imagesServiceContract->createImage($data['image']);
                $data['image_id'] = $image->id;
                $oldImageId = $article->image_id;
            }
            if (! empty($oldImageId)) {
                $imagesServiceContract->deleteImage($oldImageId);
            }

            $article = $articlesRepositoryContract->update($id, $data);
            $tagsSynchronizerServiceContract->sync($article, $tagsRequest->get('tags'));
            return back()->with('success_message', ['Запись успешно изменена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не изменена']);
        }
    }

    public function articleDeleteRequest($slug,
                                         ArticlesRepositoryContract $articlesRepositoryContract,
                                         ImagesServiceContract $imagesServiceContract
    ): RedirectResponse
    {
        try {
            $article = $articlesRepositoryContract->findBySlug($slug);
            $imagesServiceContract->deleteImage($article->image_id);
            $id = $articlesRepositoryContract->findBySlug($slug)->id;
            $articlesRepositoryContract->delete($id);
            return back()->with('success_message', ['Запись с slug=' . $slug . ' успешно удалена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись с slug=' . $slug . ' не удалена']);
        }
    }
}
