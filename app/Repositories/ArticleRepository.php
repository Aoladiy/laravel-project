<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ArticleRepository implements ArticlesRepositoryContract
{
    use FlushesCache;

    protected function cacheTags(): array
    {
        return ['articles'];
    }

    public function __construct(private readonly Article $article)
    {
    }

    public function getNews(int $amount): Collection
    {
        return Cache::tags(['articles', 'images', 'tags'])->remember("News|$amount",
            3600,
            fn() => $this->getArticle()->with(['image', 'tags'])->limit($amount)->latest('published_at')->get()
        );
    }

    public function getAllPublishedNews(array  $fields = ['*'],
                                        int    $perPage = 5,
                                        int    $page = 1,
                                        string $pageName = 'page'): LengthAwarePaginator
    {
        return Cache::tags(['articles', 'images', 'tags'])->remember(
            sprintf("allPublishedNews|%s", serialize([
                'fields' => $fields,
                'perPage' => $perPage,
                'page' => $page,
                'pageName' => $pageName
            ])),
            3600,
            fn() => $this->getArticle()->with('image', 'tags')->where('published_at', '<>', null)->latest('published_at')->paginate($perPage, $fields, $pageName, $page)
        );
    }

    public function getAmountOfNews(): int
    {
        return $this->getArticle()->count();
    }

    public function getLongestArticle(): Article
    {
        return $this->getArticle()
            ->select('id', 'title')
            ->selectRaw('LENGTH(body) as body_length')
            ->orderByDesc('body_length')
            ->first();
    }

    public function getShortestArticle(): Article
    {
        return $this->getArticle()
            ->select('id', 'title')
            ->selectRaw('LENGTH(body) as body_length')
            ->orderBy('body_length')
            ->first();
    }

    public function getMostTaggedArticle(): Article
    {
        return $this->getArticle()->withCount('tags')->orderByDesc('tags_count')->first();
    }

    public function findBySlug($slug): Article
    {
        return Cache::tags(['articles', 'images', 'tags'])->remember(
            sprintf("findArticleBySlug|%s", $slug),
            3600,
            fn() => $this->getArticle()->with(['image', 'tags'])->where('slug', $slug)->firstOrFail()
        );
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
        $article = $this->getArticle()->create($fields);
        $this->flushCache();
        return $article;
    }

    public function update(int $id, array $fields): Article
    {
        $model = $this->findById($id);
        $model->update($fields);
        $this->flushCache();
        return $model;
    }

    public function delete(int $id): void
    {
        $this->findById($id)->delete();
        $this->flushCache();
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }
}
