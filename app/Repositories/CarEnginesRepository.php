<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarEnginesRepositoryContract;
use App\Models\CarEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CarEnginesRepository implements CarEnginesRepositoryContract
{
    public function __construct(private readonly CarEngine $engine)
    {
    }

    public function findAll(): Collection
    {
        return $this->getEngine()->get();
    }

    public function findById(int $id): CarEngine
    {
        return $this->getEngine()->findOrFail($id);
    }

    public function create(array $fields): CarEngine
    {
        return $this->getEngine()->create($fields);
    }

    public function update(int $id, array $fields): CarEngine
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
     * @return CarEngine
     */
    public function getEngine(): CarEngine
    {
        return $this->engine;
    }
}
