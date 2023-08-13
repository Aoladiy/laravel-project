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
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function articles(ArticlesRepositoryContract $articlesRepositoryContract): View
    {
        $this->authorize('viewAny', Article::class);
        $articles = $articlesRepositoryContract->findAll();
        return view('pages.admin.admin_articles', ['articles' => $articles]);
    }

    public function articleCreate(): View
    {
        $this->authorize('create', Article::class);
        return view('pages.admin.admin_article_create');
    }

    public function articleCreateRequest(ArticleRequest               $request,
                                         TagsRequest                  $tagsRequest,
                                         ArticleCreateServiceContract $articleCreateServiceContract
    ): RedirectResponse
    {
        $this->authorize('create', Article::class);
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
        $this->authorize('update', [Article::class, $article]);
        return view('pages.admin.admin_article_edit', ['article' => $article]);
    }

    public function articleEditRequest(ArticleRequest             $request,
                                       TagsRequest                $tagsRequest,
                                       string                     $slug,
                                       ArticlesRepositoryContract $articlesRepositoryContract,
                                       ArticleEditServiceContract $articleEditServiceContract,
    ): RedirectResponse
    {
        $id = $articlesRepositoryContract->findBySlug($slug)->id;
        $this->authorize('update', [Article::class, $articlesRepositoryContract->findBySlug($slug)]);
        $data = $request->only(['title', 'description', 'body', 'image', 'published_at', 'tags']);
        $tags = $tagsRequest->get('tags');
        try {
            $articleEditServiceContract->edit($data, $id, $tags);
            return back()->with('success_message', ['Запись успешно изменена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не изменена']);
        }
    }

    public function articleDeleteRequest(string                       $slug,
                                         ArticleDeleteServiceContract $articleDeleteServiceContract,
                                         ArticlesRepositoryContract   $articlesRepositoryContract,
    ): RedirectResponse
    {
        $this->authorize('delete', [Article::class, $articlesRepositoryContract->findBySlug($slug)]);
        try {
            $articleDeleteServiceContract->delete($slug);
            return back()->with('success_message', ['Запись с slug=' . $slug . ' успешно удалена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись с slug=' . $slug . ' не удалена']);
        }
    }
}
