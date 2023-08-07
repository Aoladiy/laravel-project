<?php

namespace App\Services\Article;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\Article\ArticleDeleteServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use Illuminate\Support\Facades\DB;

class ArticleDeleteService implements ArticleDeleteServiceContract
{
    public function __construct(public readonly ArticlesRepositoryContract $articlesRepositoryContract,
                                public readonly ImagesServiceContract      $imagesServiceContract)
    {
    }

    public function delete(string $slug): void
    {
        DB::transaction(function () use ($slug) {
            $article = $this->articlesRepositoryContract->findBySlug($slug);
            if (isset($article->image_id)) {
                $this->imagesServiceContract->deleteImage($article->image_id);
            }
            $id = $this->articlesRepositoryContract->findBySlug($slug)->id;
            $this->articlesRepositoryContract->delete($id);
        });
    }
}
