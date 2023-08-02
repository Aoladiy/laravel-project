<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface CarsRepositoryContract
{
    public function getCatalog(CatalogFilterDTO $catalogFilterDTO): Collection;

    public function getModelsOfTheWeek(): Collection;

    public function findAll(): Collection;

    public function findById(int $id): Car;

    public function create(array $fields): Car;

    public function update(int $id, array $fields): Car;

    public function delete(int $id): void;
}
