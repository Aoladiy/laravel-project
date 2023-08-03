<?php

namespace App\Contracts\Repositories;

use App\Models\Category;

interface CategoriesRepositoryContract
{
    public function findBySlug($slug): Category|null;
}
