<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoriesRepositoryContract
{
    public function __construct(private readonly Category $category)
    {
    }

    public function findBySlug($slug): Category|null
    {
        return $this->getCategory()->where('slug', $slug)->first();
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }
}
