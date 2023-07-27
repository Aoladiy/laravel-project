<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
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
}
