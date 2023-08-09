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

    public function getRandomSalons(int $amount = 2): array|null
    {
        return Cache::tags($this->cacheTags())->remember("randomSalons|$amount", 60*5, fn () => $this->salonsClientServiceContract->getRandomSalons($amount)) ??
            Cache::tags($this->cacheTags())->remember("randomSalons|$amount", 30, fn () => $this->salonsClientServiceContract->getRandomSalons($amount));
    }

    public function getAllSalons(): array|null
    {
        return Cache::tags($this->cacheTags())->remember("getAllSalons", 60*60, fn () => $this->salonsClientServiceContract->getAllSalons()) ??
            Cache::tags($this->cacheTags())->remember("getAllSalons", 60, fn () => $this->salonsClientServiceContract->getAllSalons());
    }
}
