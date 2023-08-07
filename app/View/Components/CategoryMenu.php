<?php

namespace App\View\Components;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class CategoryMenu extends Component
{
    private ?Category $currentCategory;

    private CategoriesRepositoryContract $categoriesRepositoryContract;

    /**
     * Create a new component instance.
     */
    public function __construct(CategoriesRepositoryContract $categoriesRepositoryContract)
    {
        $this->categoriesRepositoryContract = $categoriesRepositoryContract;
        try {
            $this->currentCategory = $categoriesRepositoryContract->getCurrentCategoryWithAncestors(Route::current()->slug);
        } catch (\Throwable $exception) {
            $this->currentCategory = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string|Closure
    {
        $categories = $this->categoriesRepositoryContract->getCategoriesTree(1);
        return view('components.panels.category-menu', ['categories' =>
            $categories]);
    }

    public function selectedCategory(?Category $category = null): bool
    {
        if (!Route::is('catalog')) {
            return false;
        }
        if ($category === null || $this->currentCategory === null) {
            return $this->currentCategory === $category;
        }
        return $this->currentCategory->id === $category->id
            || $this->currentCategory->ancestors->keyBy('id')->has($category->id);
    }
}
