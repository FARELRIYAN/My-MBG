<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Interfaces\UserRepositoryInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Interfaces\SchoolRepositoryInterface::class, \App\Repositories\SchoolRepository::class);
        $this->app->bind(\App\Interfaces\MenuRepositoryInterface::class, \App\Repositories\MenuRepository::class);
        $this->app->bind(\App\Interfaces\ComplaintRepositoryInterface::class, \App\Repositories\ComplaintRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
