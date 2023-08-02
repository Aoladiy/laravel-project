<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarClassesRepositoryContract;
use App\Models\CarClass;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CarClassesRepository implements CarClassesRepositoryContract
{
    public function __construct(private readonly CarClass $class)
    {
    }

    public function findAll(): Collection
    {
        return $this->getClass()->get();
    }

    public function findById(int $id): CarClass
    {
        return $this->getClass()->findOrFail($id);
    }

    public function create(array $fields): CarClass
    {
        return $this->getClass()->create($fields);
    }

    public function update(int $id, array $fields): CarClass
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
     * @return CarClass
     */
    public function getClass(): CarClass
    {
        return $this->class;
    }
}
