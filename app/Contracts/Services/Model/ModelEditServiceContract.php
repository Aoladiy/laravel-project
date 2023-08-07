<?php

namespace App\Contracts\Services\Model;

interface ModelEditServiceContract
{
    public function edit(int $id, array $data);
}
