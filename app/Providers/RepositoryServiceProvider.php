<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerRepositories();
    }

    public function registerRepositories()
    {
        $this->app->bind(
            App\Repositories\Institution\IInstitutionListRepository::class,
            App\Repositories\Institution\Actions\ListInstitutionRepository::class,
        );
    }
}
