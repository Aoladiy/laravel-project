<?php

namespace App\Repositories;

use App\Contracts\Repositories\SalonsClientRepositoryContract;
use App\Contracts\Services\SalonsClientServiceContract;
use Illuminate\Support\Facades\Cache;

class SalonsClientRepository implements SalonsClientRepositoryContract
{
    use FlushesCache;

    protected function cacheTags(): array
    {
        return ['salons'];
    }

    public function __construct(public readonly SalonsClientServiceContract $salonsClientServiceContract)
    {
    }

    public function getRandomSalons(int $amount = 2): array|bool
    {
        $randomSalons = $this->salonsClientServiceContract->getRandomSalons($amount);
        if ($randomSalons !== null) {
            return Cache::tags($this->cacheTags())->remember("randomSalons|$amount", 60 * 5, fn() => $randomSalons);
        } else {
            return Cache::tags($this->cacheTags())->remember("randomSalons|$amount", 30, fn() => false);
        }
    }

    public function getAllSalons(): array|bool
    {
        $allSalons = $this->salonsClientServiceContract->getAllSalons();
        if ($allSalons !== null) {
            return Cache::tags($this->cacheTags())->remember("getAllSalons", 60 * 60, fn() => $allSalons);
        } else {
            return Cache::tags($this->cacheTags())->remember("getAllSalons", 60, fn() => false);
        }
    }
}
