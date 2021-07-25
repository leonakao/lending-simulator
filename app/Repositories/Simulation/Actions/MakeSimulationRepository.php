<?php

namespace App\Repositories\Simulation\Actions;

use App\Repositories\Fee\Contracts\ListFeeContract;
use App\Repositories\Simulation\Contracts\MakeSimulationContract;
use App\Repositories\Simulation\SimulationBaseRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class MakeSimulationRepository extends SimulationBaseRepository implements MakeSimulationContract
{
    public function __invoke(array $options): Collection
    {
        $fees = app(ListFeeContract::class)([
            'institutions' => Arr::get($options, 'institutions', []),
            'agreements' => Arr::get($options, 'agreements', []),
            'installments' => Arr::get($options, 'installments', 0),
        ]);

        return $fees;
    }
}
