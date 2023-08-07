<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface CarsRepositoryContract extends FlushCacheRepositoryContract
{
    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        array            $fields = ['*'],
        int              $perPage = 10,
        int              $page = 1,
        string           $pageName = 'page',
        array            $relations = [],
    ): LengthAwarePaginator;


    public function getCatalog(CatalogFilterDTO $catalogFilterDTO, array $fields): Collection;

    public function getModelsOfTheWeek(int $amount): Collection;

    public function findAll(): Collection;

    public function findById(int $id, array $relations): Car;

    public function create(array $fields): Car;

    public function update(int $id, array $fields): Car;

    public function delete(int $id): void;
}
