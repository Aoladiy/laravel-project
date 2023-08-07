<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use App\Repositories\CarsRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function catalog(Request $request, CarsRepositoryContract $carsRepositoryContract): View
    {
        $catalogFilterDTO = (new CatalogFilterDTO())
            ->setName($request->get('name'))
            ->setLowest($request->get('lowest'))
            ->setHighest($request->get('highest'))
            ->setOrderModel($request->get('order_model'))
            ->setOrderPrice($request->get('order_price'));
        $currentPage = $request->get('page');
        $models = $carsRepositoryContract->paginateForCatalog($catalogFilterDTO, page: $currentPage ?? 1);
        return view('pages.catalog', ['models' => $models]);
    }

    public function product($id, CarsRepositoryContract $carsRepositoryContract): View
    {
        $product = $carsRepositoryContract->findById($id);
        return view('pages.product', ['product' => $product]);
    }
}
