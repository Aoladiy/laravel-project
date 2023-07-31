<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ModelRequest;
use App\Models\Article;
use App\Models\Car;
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

    public function adminArticles(): View
    {
        $articles = Article::get();
        return view('pages.admin.admin_articles', ['articles' => $articles]);
    }

    public function adminArticleCreate(): View
    {
        return view('pages.admin.admin_article_create');
    }

    public function adminArticleCreateRequest(ArticleRequest $request): RedirectResponse
    {
        $data = $request->only(['title', 'description', 'body', 'published_at']);

        if (isset($data['published_at'])) {
            $data['published_at'] = date('Y-m-d H:i:s');
        } else {
            $data['published_at'] = null;
        }

        $data['slug'] = Str::slug($data['title']);

        $isSlugExists = Article::where('slug', '=', $data['slug'])->pluck('slug')->all();
        if ($isSlugExists) {
            return back()->with('error_message', ['Запись с таким slug уже существует']);
        }

        try {
            Article::create($data);
            return back()->with('success_message', ['Запись успешно создана']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не создана']);
        }
    }
    public function adminModels(): View
    {
        $models = Car::get();
        return view('pages.admin.admin_models', ['models' => $models]);
    }

    public function adminModelCreate(): View
    {
        return view('pages.admin.admin_model_create');
    }

    public function adminModelCreateRequest(ModelRequest $request): RedirectResponse
    {
        $data = $request->only(['name', 'body', 'price', 'old_price', 'salon', 'kpp', 'year', 'color', 'is_new', 'engine_id', 'carcase_id', 'class_id']);
        try {
            Car::create($data);
            return back()->with('success_message', ['Запись успешно создана']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не создана']);
        }
    }

    public function adminModelEdit(Car $model): View
    {
        return view('pages.admin.admin_model_edit', ['model' => $model]);
    }

    public function adminModelEditRequest(ModelRequest $request, Car $model): RedirectResponse
    {
        $data = $request->only(['name', 'body', 'price', 'old_price', 'salon', 'kpp', 'year', 'color', 'is_new', 'engine_id', 'carcase_id', 'class_id']);
        try {
            $model->update($data);
            return back()->with('success_message', ['Запись успешно изменена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись не изменена']);
        }
    }

    public function adminModelDeleteRequest(Car $model): RedirectResponse
    {
        try {
            $id = $model->id;
            $model->delete();
            return back()->with('success_message', ['Запись с id=' . $id . ' успешно удалена']);
        } catch (\Exception $exception) {
            return back()->with('error_message', ['Запись с id=' . $id . ' не удалена']);
        }
    }
}
