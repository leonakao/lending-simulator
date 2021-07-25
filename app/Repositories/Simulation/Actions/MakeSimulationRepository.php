<?php

namespace App\Repositories\Simulation\Actions;

use App\Repositories\Institution\Actions\ListInstitutionRepository;
use App\Repositories\Simulation\Contracts\MakeSimulationContract;
use App\Repositories\Simulation\SimulationBaseRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class MakeSimulationRepository extends SimulationBaseRepository implements MakeSimulationContract
{
    public function __invoke(array $options): Collection
    {
        $institutions = app(ListInstitutionRepository::class)(
            Arr::get($options, 'instituicoes', [])
        );

        return $institutions;
    }
}
