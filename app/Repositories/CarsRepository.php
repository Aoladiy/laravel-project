<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CarsRepository implements CarsRepositoryContract
{
    use FlushesCache;

    public function cacheTags(): array
    {
        return ['cars'];
    }

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
        return Cache::tags(['cars', 'images'])->remember(sprintf("paginateForCatalog|%s", serialize([
            'filter' => $catalogFilterDTO,
            'fields' => $fields,
            'perPage' => $perPage,
            'page' => $page,
            'pageName' => $pageName,
            'relations' => $relations
        ])),
        3600,
            fn()=>$this->catalogQuery($catalogFilterDTO)->with($relations)->paginate($perPage, $fields, $pageName, $page)
        );
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

    public function getModelsOfTheWeek(int $amount): Collection
    {
        return Cache::tags(['cars', 'images'])->remember(
            "mainPageCars|$amount",
            3600,
            fn() => $this->getModel()->with(['image'])->limit($amount)->where('is_new', '=', true)->get()
        );
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function findById(int $id, array $relations = []): Car
    {
        return Cache::tags(['cars', 'images', 'tags', 'carCarcases', 'carEngines', 'carClasses'])->remember(sprintf("findCarById|%s|%s", $id, implode('|', $relations)),
            3600,
            fn() => $this->getModel()->when($relations, fn($query) => $query->with($relations))->findOrFail($id)
        );
    }

    public function create(array $fields): Car
    {
        $car = $this->getModel()->create($fields);
        $this->flushCache();
        return $car;
    }

    public function update(int $id, array $fields): Car
    {
        $model = $this->findById($id);
        $model->update($fields);
        $this->flushCache();
        return $model;
    }

    public function delete(int $id): void
    {
        $this->findById($id)->delete();
        $this->flushCache();
    }

    /**
     * @return Car
     */
    public function getModel(): Car
    {
        return $this->model;
    }
}
