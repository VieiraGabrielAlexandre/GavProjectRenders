<?php

namespace App\Providers;

use App\Services\ClienteBaseService;
use App\Services\ClientService;
use App\Services\Contracts\ClientBaseServiceInterface;
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
        $this->app->bind(ClientBaseServiceInterface::class, ClientService::class);
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
