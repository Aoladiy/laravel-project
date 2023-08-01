<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use App\Models\CarCarcase;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): View
    {
        $articles = Article::limit(3)->latest('published_at')->get();
        $models = Car::limit(4)->where('is_new', '=', true)->get();
        return view('pages.homepage', ['articles' => $articles, 'models' => $models]);
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
        $models = Car::get();
        $avgPrice = $models->avg('price');
        $avgPriceWithDiscounts = $models->where('old_price', '<>', null)->avg('price');
        $maxPrice = $models->max('price');
        $salons = $models->unique('salon')->pluck('salon');
        $sortedEngines = $models->map->engine->pluck('name')->sort();
        $sortedClasses = $models->map->class->pluck('name')->sort()->keyBy(function ($name) {
            return Str::slug($name);
        });
        $withDiscountsFiveOrSix = $models->where('old_price', '<>', null)->filter(function ($model) {
            return
                str_contains($model->name, '5') ||
                str_contains($model->name, '6') ||
                str_contains($model->engine->name, '5') ||
                str_contains($model->engine->name, '6') ||
                str_contains($model->kpp, '5') ||
                str_contains($model->kpp, '6');
        });
        $last = $models
            ->groupBy(function (Car $car, int $key) {
                return $car->carcase->name;
            })
            ->map(function ($collection) {
                return $collection->map(function ($model) {
                    $model->priceToSort = $model->old_price ?? $model->price;
                    return $model;
                });
            })
            ->map
            ->avg('priceToSort')
            ->sortDesc();
        return view('pages.clients', [
            'avgPrice' => $avgPrice,
            'avgPriceWithDiscounts' => $avgPriceWithDiscounts,
            'maxPrice' => $maxPrice,
            'salons' => $salons,
            'sortedEngines' => $sortedEngines,
            'sortedClasses' => $sortedClasses,
            'withDiscountsFiveOrSix' => $withDiscountsFiveOrSix,
            'last' => $last,
        ]);
    }

    public function articles(): View
    {
        $articles = Article::where('published_at', '<>', null)->latest('published_at')->get();
        return view('pages.articles', ['articles' => $articles]);
    }

    public function article(Article $article): View
    {
        return view('pages.article', ['article' => $article]);
    }
}
