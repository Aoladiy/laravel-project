<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
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
}
