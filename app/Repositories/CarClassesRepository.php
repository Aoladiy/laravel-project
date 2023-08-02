<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarClassesRepositoryContract;
use App\Models\CarClass;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CarClassesRepository implements CarClassesRepositoryContract
{
    public function __construct(private readonly CarClass $class)
    {
    }
}
