<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface ArticlesRepositoryContract extends FlushCacheRepositoryContract
{
    public function getNews(int $amount): Collection;

    public function getAllPublishedNews(array  $fields = ['*'],
                                        int    $perPage = 5,
                                        int    $page = 1,
                                        string $pageName = 'page'): LengthAwarePaginator;

    public function getAmountOfNews(): int;

    public function getLongestArticle(): Article;

    public function getShortestArticle(): Article;

    public function getMostTaggedArticle(): Article;

    public function findBySlug($slug): Article;

    public function findAll(): Collection;

    public function findById(int $id): Article;

    public function create(array $fields): Article;

    public function update(int $id, array $fields): Article;

    public function delete(int $id): void;
}
