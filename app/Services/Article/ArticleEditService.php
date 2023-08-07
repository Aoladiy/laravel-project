<?php

namespace App\Services\Article;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Services\Article\ArticleEditServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use Illuminate\Support\Facades\DB;

class ArticleEditService implements ArticleEditServiceContract
{
    public function __construct(public readonly ImagesServiceContract           $imagesServiceContract,
                                public readonly TagsSynchronizerServiceContract $tagsSynchronizerServiceContract,
                                public readonly ArticlesRepositoryContract      $articlesRepositoryContract)
    {
    }

    public function edit(array $data, $id, $tags)
    {
        DB::transaction(function () use($data, $id, $tags){
            $oldImageId = null;
            $article = $this->articlesRepositoryContract->findById($id);
            if (!empty($data['image'])) {
                $image = $this->imagesServiceContract->createImage($data['image']);
                $data['image_id'] = $image->id;
                $oldImageId = $article->image_id;
            }
            if (!empty($oldImageId)) {
                $this->imagesServiceContract->deleteImage($oldImageId);
            }
            $article = $this->articlesRepositoryContract->update($id, $data);
            $this->tagsSynchronizerServiceContract->sync($article, $tags);
        });
    }
}
