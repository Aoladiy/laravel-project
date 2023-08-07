<?php

namespace App\Contracts\Services\Model;

interface ModelDeleteServiceContract
{
    public function delete(int $id): void;
}
