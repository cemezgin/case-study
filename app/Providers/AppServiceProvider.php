<?php

namespace App\Providers;

use App\Service\HotelService;
use App\Service\Interfaces\HotelServiceInterface;
use App\Service\Interfaces\LocationServiceInterface;
use App\Service\LocationService;
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
        $this->app->bind(
            HotelServiceInterface::class,
            HotelService::class
        );

        $this->app->bind(
            LocationServiceInterface::class,
            LocationService::class
        );
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
