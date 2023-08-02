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

    public function getCatalog(Request $request): Collection
    {
        return $this->getModel()
            ->when(($model = $request->get('name')) !== null, fn($query) => $query->where('name', 'like', "%$model%"))
            ->when(($minPrice = $request->get('lowest')) !== null, fn($query) => $query->where('price', '>=', $minPrice))
            ->when(($maxPrice = $request->get('highest')) !== null, fn($query) => $query->where('price', '<=', $maxPrice))
            ->when(($orderPrice = $request->get('order_price')) !== null, fn($query) => $query
                ->orderBy('price', $orderPrice === 'desc' ? 'desc' : 'asc'))
            ->when(($orderModel = $request->get('order_model')) !== null, fn($query) => $query
                ->orderBy('name', $orderModel === 'desc' ? 'desc' : 'asc'))
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
