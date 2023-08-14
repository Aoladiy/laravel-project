<?php

namespace App\Services\Article;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\Article\ArticleCreateServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Events\ArticleCreatedEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class ArticleCreateService implements ArticleCreateServiceContract
{
    public function __construct(public readonly ArticlesRepositoryContract      $articlesRepositoryContract,
                                public readonly ImagesServiceContract           $imagesServiceContract,
                                public readonly TagsSynchronizerServiceContract $tagsSynchronizerServiceContract)
    {
    }

    public function create(array $data, $tags)
    {
        try {
            $this->articlesRepositoryContract->findBySlug($data['slug']);
            return false;
        } catch (\Exception $exception) {
        }
        DB::transaction(function () use ($data, $tags) {
            if (!empty($data['image'])) {
                $image = $this->imagesServiceContract->createImage($data['image']);
                $data['image_id'] = $image->id;
            }
            $article = $this->articlesRepositoryContract->create($data);
            $this->tagsSynchronizerServiceContract->sync($article, $tags);
            Event::dispatch(new ArticleCreatedEvent($article));
        });
    }
}
