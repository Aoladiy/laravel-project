<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CarsRepository implements CarsRepositoryContract
{
    public function __construct(private readonly Car $model)
    {
    }

    public function getCatalog($name = null,
                               $lowest = null,
                               $highest = null,
                               $order_price = null,
                               $order_model = null): Collection
    {
        return $this->getModel()
            ->when($name !== null, fn($query) => $query->where('name', 'like', "%$name%"))
            ->when($lowest !== null, fn($query) => $query->where('price', '>=', $lowest))
            ->when($highest !== null, fn($query) => $query->where('price', '<=', $highest))
            ->when($order_price !== null, fn($query) => $query
                ->orderBy('price', $order_price === 'desc' ? 'desc' : 'asc'))
            ->when($order_model !== null, fn($query) => $query
                ->orderBy('name', $order_model === 'desc' ? 'desc' : 'asc'))
            ->get();
    }

    public function getModelsOfTheWeek(): Collection
    {
        return $this->getModel()->limit(4)->where('is_new', '=', true)->get();
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function findById(int $id): Car
    {
        return $this->getModel()->findOrFail($id);
    }

    public function create(array $fields): Car
    {
        return $this->getModel()->create($fields);
    }

    public function update(int $id, array $fields): Car
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
     * @return Car
     */
    public function getModel(): Car
    {
        return $this->model;
    }
}
