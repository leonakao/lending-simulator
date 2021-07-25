<?php

namespace App\Repositories\Simulation\Actions;

use App\Repositories\Agreement\Contracts\ListAgreementContract;
use App\Repositories\Institution\Contracts\ListInstitutionContract;
use App\Repositories\Simulation\Contracts\MakeSimulationContract;
use App\Repositories\Simulation\SimulationBaseRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class MakeSimulationRepository extends SimulationBaseRepository implements MakeSimulationContract
{
    public function __invoke(array $options): Collection
    {
        $institutions = app(ListInstitutionContract::class)(
            Arr::get($options, 'instituicoes', [])
        );

        $agreements = app(ListAgreementContract::class)(
            Arr::get($options, 'convenios', [])
        );

        return $agreements;
    }
}
