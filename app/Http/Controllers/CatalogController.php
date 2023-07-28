<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function catalog(Request $request): View
    {
        $models = Car::query()
            ->when(($model = $request->get('name')) !== null, fn($query) => $query->where('name', 'like', "%$model%"))
            ->when(($minPrice = $request->get('lowest')) !== null, fn($query) => $query->where('price', '>=', $minPrice))
            ->when(($maxPrice = $request->get('highest')) !== null, fn($query) => $query->where('price', '<=', $maxPrice))
            ->when(($orderPrice = $request->get('order_price')) !== null, fn($query) => $query
                ->orderBy('price', $orderPrice === 'desc' ? 'desc' : 'asc'))
            ->when(($orderModel = $request->get('order_model')) !== null, fn($query) => $query
                ->orderBy('name', $orderModel === 'desc' ? 'desc' : 'asc'))
            ->get();
        return view('pages.catalog', ['models' => $models]);
    }

    public function product(Car $id): View
    {
        return view('pages.product', ['product' => $id]);
    }
}
