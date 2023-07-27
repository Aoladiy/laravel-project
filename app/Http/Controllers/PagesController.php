<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): View
    {
        $articles = Article::limit(3)->latest('published_at')->get();
        return view('pages.homepage', ['articles' => $articles]);
    }
    public function about(): View
    {
        return view('pages.about');
    }
    public function contacts(): View
    {
        return view('pages.contacts');
    }
    public function sale(): View
    {
        return view('pages.sale');
    }
    public function finance(): View
    {
        return view('pages.finance');
    }
    public function clients(): View
    {
        return view('pages.clients');
    }
}
