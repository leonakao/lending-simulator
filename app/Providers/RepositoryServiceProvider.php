<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        \App\Repositories\Institution\Contracts\ListInstitutionContract::class =>
            \App\Repositories\Institution\Actions\ListInstitutionRepository::class
    ];

    public function register()
    {
        $this->registerRepositories();
    }

    public function registerRepositories()
    {
        foreach ($this->repositories as $contract => $implementation) {
            $this->app->bind($contract, $implementation);
        }
    }
}
