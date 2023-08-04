<?php

namespace App\Contracts\Repositories;

use App\Models\Category;
use Kalnoy\Nestedset\Collection;

interface CategoriesRepositoryContract
{
    public function findBySlug($slug): Category|null;

    public function getCategoriesTree(): Collection;
}
