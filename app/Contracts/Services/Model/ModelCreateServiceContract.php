<?php

namespace App\Contracts\Services\Model;

use App\Contracts\Repositories\ArticlesRepositoryContract;

interface ModelCreateServiceContract
{
    public function create(array $data);
}
