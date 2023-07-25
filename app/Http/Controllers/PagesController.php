<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): View
    {
        return view('pages.homepage');
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
