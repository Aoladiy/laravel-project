<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface BannersRepositoryContract
{
    public function getRandomBanners(int $amount): Collection;
}
