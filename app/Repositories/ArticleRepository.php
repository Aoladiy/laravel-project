<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ArticleRepository implements ArticlesRepositoryContract
{
    public function __construct(private readonly Article $article)
    {
    }

    public function getNews(): Collection
    {
        return $this->getArticle()->limit(3)->latest('published_at')->get();
    }

    public function getAllPublishedNews(array  $fields = ['*'],
                                        int    $perPage = 5,
                                        int    $page = 1,
                                        string $pageName = 'page'): LengthAwarePaginator
    {
        return $this->getArticle()->where('published_at', '<>', null)->latest('published_at')->paginate($perPage, $fields, $pageName, $page);
    }

    public function findBySlug($slug): Article
    {
        return $this->getArticle()->where('slug', $slug)->firstOrFail();
    }

    public function findAll(): Collection
    {
        return $this->getArticle()->get();
    }

    public function findById(int $id): Article
    {
        return $this->getArticle()->findOrFail($id);
    }

    public function create(array $fields): Article
    {
        return $this->getArticle()->create($fields);
    }

    public function update(int $id, array $fields): Article
    {
        $model = $this->findById($id);
        $model->update($fields);
        return $model;
    }

    public function delete(int $id): void
    {
        $this->findById($id)->delete();
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }
}
