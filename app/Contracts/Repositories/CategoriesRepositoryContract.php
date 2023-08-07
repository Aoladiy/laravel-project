<?php

namespace App\Contracts\Repositories;

use App\Models\Category;
use Kalnoy\Nestedset\Collection;

interface CategoriesRepositoryContract extends FlushCacheRepositoryContract
{
    public function findBySlug($slug, array $relations): Category|bool;

    public function getCategoriesTree(int $maxDepth): Collection;

    public function getCurrentCategoryWithAncestors($slug): Category;

    public function getCategoryDescendantsIds(Category $category): array;
}
