<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Models\Car;
use App\Repositories\CarsRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function catalog(Request $request, CarsRepositoryContract $carsRepositoryContract): View
    {
        $models = $carsRepositoryContract->getCatalog($request);
        return view('pages.catalog', ['models' => $models]);
    }

    public function product($id, CarsRepositoryContract $carsRepositoryContract): View
    {
        $product = $carsRepositoryContract->findById($id);
        return view('pages.product', ['product' => $product]);
    }
}
