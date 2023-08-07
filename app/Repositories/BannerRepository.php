<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;

class BannerRepository implements BannersRepositoryContract
{
    public function __construct(private readonly Banner $banner)
    {
    }

    public function getRandomBanners(int $amount): Collection
    {
        return $this->getBanner()->inRandomOrder()->limit($amount)->get();
    }

    /**
     * @return Banner
     */
    public function getBanner(): Banner
    {
        return $this->banner;
    }
}
