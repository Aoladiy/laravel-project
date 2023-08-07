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
        $image = $this->getModel()->create(['path' => $diskPath]);
        $this->flushCache();
        return $image;
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
        $image = $this->getModel()->where('id', $id)->delete();
        $this->flushCache();
        return $image;
    }

}
