<?php

namespace App\Providers;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\BannersRepositoryContract;
use App\Contracts\Repositories\CarCarcasesRepositoryContract;
use App\Contracts\Repositories\CarClassesRepositoryContract;
use App\Contracts\Repositories\CarEnginesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Contracts\Repositories\RolesRepositoryContract;
use App\Contracts\Repositories\SalonsClientRepositoryContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Repositories\ArticleRepository;
use App\Repositories\BannerRepository;
use App\Repositories\CarCarcasesRepository;
use App\Repositories\CarClassesRepository;
use App\Repositories\CarEnginesRepository;
use App\Repositories\CarsRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\RolesRepository;
use App\Repositories\SalonsClientRepository;
use App\Repositories\TagsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CarsRepositoryContract::class,
            CarsRepository::class);
        $this->app->singleton(ArticlesRepositoryContract::class,
            ArticleRepository::class);
        $this->app->singleton(CarCarcasesRepositoryContract::class,
            CarCarcasesRepository::class);
        $this->app->singleton(CarClassesRepositoryContract::class,
            CarClassesRepository::class);
        $this->app->singleton(CarEnginesRepositoryContract::class,
            CarEnginesRepository::class);
        $this->app->singleton(TagsRepositoryContract::class,
            TagsRepository::class);
        $this->app->singleton(CategoriesRepositoryContract::class,
            CategoryRepository::class);
        $this->app->singleton(ImagesRepositoryContract::class,
            ImagesRepository::class);
        $this->app->singleton(BannersRepositoryContract::class,
            BannerRepository::class);
        $this->app->singleton(SalonsClientRepositoryContract::class,
            SalonsClientRepository::class);
        $this->app->singleton(RolesRepositoryContract::class,
            RolesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
