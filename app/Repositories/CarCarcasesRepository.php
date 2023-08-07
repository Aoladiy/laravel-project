<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarCarcasesRepositoryContract;
use App\Models\CarCarcase;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CarCarcasesRepository implements CarCarcasesRepositoryContract
{
    public function __construct(private readonly CarCarcase $carcase)
    {
    }
}
