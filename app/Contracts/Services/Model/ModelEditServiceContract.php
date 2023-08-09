<?php

namespace App\Contracts\Services\Model;

use App\Models\Car;

interface ModelEditServiceContract
{
    public function edit(int $id, array $data): Car;
}
