<?php

namespace App\Repositories\Simulation\Actions;

use App\Repositories\Fee\Contracts\ListFeeContract;
use App\Repositories\Simulation\Contracts\CalculateInstallmentValueContract;
use App\Repositories\Simulation\Contracts\MakeSimulationContract;
use App\Repositories\Simulation\SimulationBaseRepository;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class MakeSimulationRepository extends SimulationBaseRepository implements MakeSimulationContract
{
    public function __invoke(array $options): Collection
    {
        $lendingValue = Arr::get($options, 'lendingValue');

        $calculate = app(CalculateInstallmentValueContract::class);

        $fees = app(ListFeeContract::class)([
            'institutions' => Arr::get($options, 'institutions', []),
            'agreements' => Arr::get($options, 'agreements', []),
            'installments' => Arr::get($options, 'installments', 0),
        ])
            ->map(function ($fee) use ($lendingValue, $calculate) {
                $fee->valor_parcela = $calculate(
                    $lendingValue,
                    $fee->parcelas,
                    $fee->coeficiente
                );

                return $fee;
            });

        return $fees;
    }
}
