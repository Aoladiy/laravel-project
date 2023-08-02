<?php

namespace App\Contracts\Repositories;

use App\Models\CarClass;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface CarClassesRepositoryContract
{
    public function findAll(): Collection;

    public function findById(int $id): CarClass;

    public function create(array $fields): CarClass;

    public function update(int $id, array $fields): CarClass;

    public function delete(int $id): void;
}
