<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CategoryRepository implements CategoriesRepositoryContract
{
    use FlushesCache;

    protected function cacheTags(): array
    {
        return ['categories'];
    }

    public function __construct(private readonly Category $category)
    {
    }

    public function findBySlug($slug, array $relations = []): Category|bool
    {
        return Cache::tags(['categories', 'cars'])->remember(sprintf("CategoryBySlug|%s|%s", $slug, implode('|', $relations)),
            3600,
            fn() => $this->getCategory()->where('slug', $slug)->when($relations, fn($query) => $query->with($relations))->first() ?? false
        );
    }

    public function getCurrentCategoryWithAncestors($slug): Category
    {
        return Cache::tags(['categories', 'cars'])->remember(sprintf("currentCategoryWithAncestors|%s", $slug),
            3600,
            fn() => $this->findBySlug($slug)->load('ancestors')
        );
    }

    public function getCategoryDescendantsIds(Category $category): array
    {
        return Cache::tags(['categories', 'cars'])->remember(sprintf("CategoryDescendantsIds|%s", $category->id),
            3600,
            fn() => $category->descendants->pluck('id')->push($category->id)->all()
        );
    }

    public function getCategoriesTree(?int $maxDepth = null): \Kalnoy\Nestedset\Collection
    {
        return Cache::tags(['categories', 'cars'])->remember("categoriesTree|$maxDepth",
            3600,
            fn() => $this->getCategory()->withDepth()->having('depth', '<=', $maxDepth)->orderBy('sort')->get()->toTree()
        );
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }
}
