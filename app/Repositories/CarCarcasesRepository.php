<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarCarcasesRepositoryContract;
use App\Models\CarCarcase;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CarCarcasesRepository implements CarCarcasesRepositoryContract
{
    public function __construct(private readonly CarCarcase $carcase)
    {
    }

    public function findAll(): Collection
    {
        return $this->getCarcase()->get();
    }

    public function findById(int $id): CarCarcase
    {
        return $this->getCarcase()->findOrFail($id);
    }

    public function create(array $fields): CarCarcase
    {
        return $this->getCarcase()->create($fields);
    }

    public function update(int $id, array $fields): CarCarcase
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
     * @return CarCarcase
     */
    public function getCarcase(): CarCarcase
    {
        return $this->carcase;
    }
}
