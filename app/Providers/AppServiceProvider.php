<?php

namespace App\Providers;

use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Services\TagsSynchronizerService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TagsSynchronizerServiceContract::class,
        TagsSynchronizerService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
