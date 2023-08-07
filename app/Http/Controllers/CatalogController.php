<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use App\Models\Category;
use App\Repositories\CarsRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function catalog(Request $request,
                            CategoriesRepositoryContract $categoriesRepositoryContract,
                            CarsRepositoryContract $carsRepositoryContract,
                            $slug = null,
                            ): View
    {
        $allCategories = collect();
        $category = $categoriesRepositoryContract->findBySlug($slug, ['cars']) === false ? null : $categoriesRepositoryContract->findBySlug($slug, ['cars']);
        if ($category) {
            $allCategories = $categoriesRepositoryContract->getCategoryDescendantsIds($category);
        }
        $catalogFilterDTO = (new CatalogFilterDTO())
            ->setName($request->get('name'))
            ->setLowest($request->get('lowest'))
            ->setHighest($request->get('highest'))
            ->setOrderModel($request->get('order_model'))
            ->setOrderPrice($request->get('order_price'))
            ->setCategory($category)
            ->setAllCategories($allCategories);
        $currentPage = $request->get('page');
        $models = $carsRepositoryContract->paginateForCatalog($catalogFilterDTO, page: $currentPage ?? 1, relations: ['image']);
        return view('pages.catalog', ['models' => $models, 'currentCategory' => $category]);
    }

    public function product($id, CarsRepositoryContract $carsRepositoryContract): View
    {
        $product = $carsRepositoryContract->findById($id, ['image', 'images', 'engine', 'carcase', 'class']);
        return view('pages.product', ['product' => $product]);
    }
}
