<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\HobbyService;
use App\Contracts\AuthContract;
use App\Contracts\HobbyContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthContract::class, AuthService::class);
        $this->app->bind(HobbyContract::class, HobbyService::class);
        $this->app->bind(HobbyContract::class, HobbyService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
