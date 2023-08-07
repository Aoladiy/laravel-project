<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\Article\ArticleCreateServiceContract;
use App\Contracts\Services\Article\ArticleDeleteServiceContract;
use App\Contracts\Services\Article\ArticleEditServiceContract;
use App\Contracts\Services\ImagesServiceContract;
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

    public function articleCreateRequest(ArticleRequest               $request,
                                         TagsRequest                  $tagsRequest,
                                         ArticleCreateServiceContract $articleCreateServiceContract
    ): RedirectResponse
    {
        $data = $request->only(['slug', 'title', 'description', 'body', 'image', 'published_at', 'tags']);
        $tags = $tagsRequest->get('tags');
        try {
            if ($articleCreateServiceContract->create($data, $tags) === false) {
                return back()->with('error_message', ['Запись с таким slug уже существует']);
            }
            return back()->with('success_message', ['Запись успешно создана']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не создана']);
        }
    }

    public function articleEdit(string                     $slug,
                                ArticlesRepositoryContract $articlesRepositoryContract): View
    {
        $article = $articlesRepositoryContract->findBySlug($slug);
        return view('pages.admin.admin_article_edit', ['article' => $article]);
    }

    public function articleEditRequest(ArticleRequest             $request,
                                       TagsRequest                $tagsRequest,
                                       string                     $slug,
                                       ArticlesRepositoryContract $articlesRepositoryContract,
                                       ArticleEditServiceContract $articleEditServiceContract,
    ): RedirectResponse
    {
        $data = $request->only(['title', 'description', 'body', 'image', 'published_at', 'tags']);
        $id = $articlesRepositoryContract->findBySlug($slug)->id;
        $tags = $tagsRequest->get('tags');
        try {
            $articleEditServiceContract->edit($data, $id, $tags);
            return back()->with('success_message', ['Запись успешно изменена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не изменена']);
        }
    }

    public function articleDeleteRequest(string                       $slug,
                                         ArticleDeleteServiceContract $articleDeleteServiceContract
    ): RedirectResponse
    {
        try {
            $articleDeleteServiceContract->delete($slug);
            return back()->with('success_message', ['Запись с slug=' . $slug . ' успешно удалена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись с slug=' . $slug . ' не удалена']);
        }
    }
}
