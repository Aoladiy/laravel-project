<?php

namespace App\Contracts\Repositories;

use App\Models\CarCarcase;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface CarCarcasesRepositoryContract
{
    public function findAll(): Collection;

    public function findById(int $id): CarCarcase;

    public function create(array $fields): CarCarcase;

    public function update(int $id, array $fields): CarCarcase;

    public function delete(int $id): void;
}
