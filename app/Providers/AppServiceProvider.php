<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $services = [
        \App\Services\Request\RequestClientServiceInterface::class
            => \App\Services\Request\Implementation\RequestClientService::class,
        \App\Services\Authentication\AuthenticationServiceInterface::class
            => \App\Services\Authentication\Implementation\AuthenticationService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
    }

    public function registerServices()
    {
        foreach ($this->services as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
