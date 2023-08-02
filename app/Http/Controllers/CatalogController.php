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
        $name = $request->get('name');
        $lowest = $request->get('lowest');
        $highest = $request->get('highest');
        $order_price = $request->get('order_price');
        $order_model = $request->get('order_model');
        $models = $carsRepositoryContract->getCatalog($name, $lowest, $highest, $order_price, $order_model);
        return view('pages.catalog', ['models' => $models]);
    }

    public function product($id, CarsRepositoryContract $carsRepositoryContract): View
    {
        $product = $carsRepositoryContract->findById($id);
        return view('pages.product', ['product' => $product]);
    }
}
