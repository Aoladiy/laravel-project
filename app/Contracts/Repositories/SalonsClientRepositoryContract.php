<?php

namespace App\Contracts\Repositories;

use App\Contracts\Services\SalonsClientServiceContract;

interface SalonsClientRepositoryContract
{
    public function __construct(SalonsClientServiceContract $salonsClientServiceContract);

    public function getRandomSalons(int $amount): array|bool;

    public function getAllSalons(): array|bool;
}
