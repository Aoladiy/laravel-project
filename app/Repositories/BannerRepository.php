<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BannerRepository implements BannersRepositoryContract
{
    public function __construct(private readonly Banner $banner)
    {
    }

    public function getRandomBanners(int $amount): Collection
    {
        return Cache::tags(['banners', 'images'])->remember(
            sprintf("randomBanners|%s", $amount),
            3600,
            fn() => $this->getBanner()->with(['image'])->inRandomOrder()->limit($amount)->get()
        );
    }

    /**
     * @return Banner
     */
    public function getBanner(): Banner
    {
        return $this->banner;
    }
}
