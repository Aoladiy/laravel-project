<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ModelRequest;
use App\Http\Requests\TagsRequest;
use App\Models\Article;
use App\Models\Car;
use App\Services\TagsSynchronizerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function admin(): View
    {
        return view('pages.admin.admin');
    }

    public function adminArticles(ArticlesRepositoryContract $articlesRepositoryContract): View
    {
        $articles = $articlesRepositoryContract->findAll();
        return view('pages.admin.admin_articles', ['articles' => $articles]);
    }

    public function adminArticleCreate(): View
    {
        return view('pages.admin.admin_article_create');
    }

    public function adminArticleCreateRequest(ArticleRequest                  $request,
                                              TagsRequest                     $tagsRequest,
                                              ArticlesRepositoryContract      $articlesRepositoryContract,
                                              TagsSynchronizerServiceContract $tagsSynchronizerServiceContract,
    ): RedirectResponse
    {
        $data = $request->only(['slug', 'title', 'description', 'body', 'published_at', 'tags']);

        try {
            $articlesRepositoryContract->findBySlug($data['slug']);
            return back()->with('error_message', ['Запись с таким slug уже существует']);
        } catch (\Exception $exception) {
        }

        try {
            $article = $articlesRepositoryContract->create($data);
            $tagsSynchronizerServiceContract->sync($article, $tagsRequest->get('tags'));
            return back()->with('success_message', ['Запись успешно создана']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не создана']);
        }
    }

    public function adminArticleEdit($slug, ArticlesRepositoryContract $articlesRepositoryContract): View
    {
        $article = $articlesRepositoryContract->findBySlug($slug);
        return view('pages.admin.admin_article_edit', ['article' => $article]);
    }

    public function adminArticleEditRequest(ArticleRequest                  $request,
                                            TagsRequest                     $tagsRequest,
                                                                            $slug,
                                            ArticlesRepositoryContract      $articlesRepositoryContract,
                                            TagsSynchronizerServiceContract $tagsSynchronizerServiceContract
    ): RedirectResponse
    {
        $data = $request->only(['title', 'description', 'body', 'published_at', 'tags']);
        $id = $articlesRepositoryContract->findBySlug($slug)->id;
        try {
            $article = $articlesRepositoryContract->update($id, $data);
            $tagsSynchronizerServiceContract->sync($article, $tagsRequest->get('tags'));
            return back()->with('success_message', ['Запись успешно изменена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не изменена']);
        }
    }

    public function adminArticleDeleteRequest($slug, ArticlesRepositoryContract $articlesRepositoryContract): RedirectResponse
    {
        try {
            $id = $articlesRepositoryContract->findBySlug($slug)->id;
            $articlesRepositoryContract->delete($id);
            return back()->with('success_message', ['Запись с slug=' . $slug . ' успешно удалена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись с slug=' . $slug . ' не удалена']);
        }
    }

    public function adminModels(CarsRepositoryContract $carsRepositoryContract): View
    {
        $models = $carsRepositoryContract->findAll();
        return view('pages.admin.admin_models', ['models' => $models]);
    }

    public function adminModelCreate(): View
    {
        return view('pages.admin.admin_model_create');
    }

    public function adminModelCreateRequest(ModelRequest $request, CarsRepositoryContract $carsRepositoryContract): RedirectResponse
    {
        $data = $request->only(['name', 'body', 'price', 'old_price', 'salon', 'kpp', 'year', 'color', 'is_new', 'engine_id', 'carcase_id', 'class_id']);
        try {
            $carsRepositoryContract->create($data);
            return back()->with('success_message', ['Запись успешно создана']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не создана']);
        }
    }

    public function adminModelEdit($id, CarsRepositoryContract $carsRepositoryContract): View
    {
        $model = $carsRepositoryContract->findById($id);
        return view('pages.admin.admin_model_edit', ['model' => $model]);
    }

    public function adminModelEditRequest(ModelRequest $request, $id, CarsRepositoryContract $carsRepositoryContract): RedirectResponse
    {
        $data = $request->only(['name', 'body', 'price', 'old_price', 'salon', 'kpp', 'year', 'color', 'is_new', 'engine_id', 'carcase_id', 'class_id']);
        try {
            $carsRepositoryContract->update($id, $data);
            return back()->with('success_message', ['Запись успешно изменена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не изменена']);
        }
    }

    public function adminModelDeleteRequest($id, CarsRepositoryContract $carsRepositoryContract): RedirectResponse
    {
        try {
            $carsRepositoryContract->delete($id);
            return back()->with('success_message', ['Запись с id=' . $id . ' успешно удалена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись с id=' . $id . ' не удалена']);
        }
    }
}
