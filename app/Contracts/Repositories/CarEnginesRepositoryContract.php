<?php

namespace App\Contracts\Repositories;

use App\Models\CarEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface CarEnginesRepositoryContract
{
    public function findAll(): Collection;

    public function findById(int $id): CarEngine;

    public function create(array $fields): CarEngine;

    public function update(int $id, array $fields): CarEngine;

    public function delete(int $id): void;
}
