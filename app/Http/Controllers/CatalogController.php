<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function catalog(): View
    {
        $models = Car::get();
        return view('pages.catalog', ['models' => $models]);
    }

    public function product(Car $id): View
    {
        return view('pages.product', ['product' => $id]);
    }
}
