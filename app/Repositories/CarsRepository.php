<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CarsRepository implements CarsRepositoryContract
{
    public function __construct(private readonly Car $model)
    {
    }

    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array            $fields = ['*'],
        int              $perPage = 16,
        int              $page = 1,
        string           $pageName = 'page',
        array            $relations = [],
    ): LengthAwarePaginator
    {
        return $this->catalogQuery($catalogFilterDTO)->with($relations)->paginate($perPage, $fields, $pageName, $page);
    }

    public function getCatalog(CatalogFilterDTO $catalogFilterDTO,
                               array            $fields = ['*'],
    ): Collection
    {
        return $this->catalogQuery($catalogFilterDTO)->get($fields);
    }

    public function catalogQuery(CatalogFilterDTO $catalogFilterDTO)
    {
        return $this->getModel()
            ->when($catalogFilterDTO->getName() !== null, fn($query) => $query->where('name', 'like', "%" . $catalogFilterDTO->getName() . "%"))
            ->when($catalogFilterDTO->getLowest() !== null, fn($query) => $query->where('price', '>=', $catalogFilterDTO->getLowest()))
            ->when($catalogFilterDTO->getHighest() !== null, fn($query) => $query->where('price', '<=', $catalogFilterDTO->getHighest()))
            ->when($catalogFilterDTO->getOrderPrice() !== null, fn($query) => $query
                ->orderBy('price', $catalogFilterDTO->getOrderPrice() === 'desc' ? 'desc' : 'asc'))
            ->when($catalogFilterDTO->getOrderModel() !== null, fn($query) => $query
                ->orderBy('name', $catalogFilterDTO->getOrderModel() === 'desc' ? 'desc' : 'asc'))
            ->when($catalogFilterDTO->getCategory() !== null, fn($query) => $query->whereHas('categories', fn($query) => $query->whereIn('id', $catalogFilterDTO->getAllCategories())));
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
