<?php

namespace App\Repositories;

use App\Contracts\HasTagsContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    use FlushesCache;

    protected function cacheTags(): array
    {
        return ['tags'];
    }

    public function __construct(private readonly Tag $model)
    {
    }

    public function firstOrCreateByName(string $name): Tag
    {
        return $this->getModel()->firstOrCreate(['name' => $name]);
    }

    public function syncTags(HasTagsContract $model, array $tags)
    {
        $model->tags()->sync($tags);
        $this->flushCache();
    }

    private function getModel(): Tag
    {
        return $this->model;
    }
}

