<?php

namespace App\Repositories;

use App\Contracts\Repositories\CarEnginesRepositoryContract;
use App\Models\CarEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CarEnginesRepository implements CarEnginesRepositoryContract
{
    public function __construct(private readonly CarEngine $engine)
    {
    }
}
