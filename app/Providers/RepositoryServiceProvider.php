<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        \App\Repositories\Institution\Contracts\ListInstitutionContract::class =>
            \App\Repositories\Institution\Actions\ListInstitutionRepository::class,
        \App\Repositories\Agreement\Contracts\ListAgreementContract::class =>
            \App\Repositories\Agreement\Actions\ListAgreementRepository::class,
        \App\Repositories\Fee\Contracts\ListFeeContract::class =>
            \App\Repositories\Fee\Actions\ListFeeRepository::class,
        \App\Repositories\Simulation\Contracts\MakeSimulationContract::class =>
            \App\Repositories\Simulation\Actions\MakeSimulationRepository::class,
        \App\Repositories\Simulation\Contracts\CalculateInstallmentValueContract::class =>
            \App\Repositories\Simulation\Actions\CalculateInstallmentValueRepository::class,
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
