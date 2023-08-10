<?php

namespace App\Providers;

use App\Contracts\Services\Article\ArticleCreateServiceContract;
use App\Contracts\Services\Article\ArticleDeleteServiceContract;
use App\Contracts\Services\Article\ArticleEditServiceContract;
use App\Contracts\Services\Model\ModelCreateServiceContract;
use App\Contracts\Services\Model\ModelDeleteServiceContract;
use App\Contracts\Services\Model\ModelEditServiceContract;
use App\Contracts\Services\SalonsClientServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Services\Article\ArticleCreateService;
use App\Services\Article\ArticleDeleteService;
use App\Services\Article\ArticleEditService;
use App\Services\Model\ModelCreateService;
use App\Services\Model\ModelDeleteService;
use App\Services\Model\ModelEditService;
use App\Services\SalonsClientService;
use App\Services\TagsSynchronizerService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Faker\Factory;
use Faker\Generator;
use QSchool\FakerImageProvider\FakerImageProvider;
use App\Contracts\Services\ImagesServiceContract;
use App\Models\Image;
use App\Services\ImagesService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(Config::get('app.faker_locale', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });
        $this->app->singleton(TagsSynchronizerServiceContract::class,
            TagsSynchronizerService::class);
        $this->app->singleton(ImagesServiceContract::class, function () {
            return $this->app->make(ImagesService::class, ['disk' => 'public']);
        });
        $this->app->singleton(ArticleEditServiceContract::class,
            ArticleEditService::class);
        $this->app->singleton(ArticleCreateServiceContract::class,
            ArticleCreateService::class);
        $this->app->singleton(ArticleDeleteServiceContract::class,
            ArticleDeleteService::class);
        $this->app->singleton(ModelEditServiceContract::class,
            ModelEditService::class);
        $this->app->singleton(ModelCreateServiceContract::class,
            ModelCreateService::class);
        $this->app->singleton(ModelDeleteServiceContract::class,
            ModelDeleteService::class);
        $this->app->singleton(SalonsClientServiceContract::class, function () {
            return $this->app->make(SalonsClientService::class, [
                'baseUrl' => \config('services.SalonsClientService.salonsApiUrl'),
                'login' => \config('services.SalonsClientService.login'),
                'password' => \config('services.SalonsClientService.password'),
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
