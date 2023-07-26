<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function catalog(): View
    {
        return view('pages.catalog');
    }

    public function product($product): View
    {
        return view('pages.product', ['product' => $product]);
    }
}
