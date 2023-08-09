<?php

namespace App\Contracts\Services\Model;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Models\Car;

interface ModelCreateServiceContract
{
    public function create(array $data): Car;
}
