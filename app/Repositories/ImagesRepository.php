<?php

namespace App\Repositories;

use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Models\Image;

class ImagesRepository implements ImagesRepositoryContract
{
    use FlushesCache;

    protected function cacheTags(): array
    {
        return ['images'];
    }

    public function __construct(private readonly Image $model)
    {
    }

    public function create(string $diskPath): Image
    {
        $this->flushCache();
        return $this->getModel()->create(['path' => $diskPath]);
    }

    private function getModel(): Image
    {
        return $this->model;
    }

    public function getById(int $id): Image
    {
        return $this->getModel()->find($id);
    }

    public function delete(int $id)
    {
        $this->flushCache();
        return $this->getModel()->where('id', $id)->delete();
    }

}
