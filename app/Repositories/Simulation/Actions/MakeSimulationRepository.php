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
        $institutions = Arr::get($options, 'institutions', []) ?: [];
        $agreements = Arr::get($options, 'agreements', []) ?: [];
        $installments = Arr::get($options, 'installments', 0) ?: 0;

        $calculateInstallment = app(CalculateInstallmentValueContract::class);

        return app(ListFeeContract::class)([
            ['instituicao', $institutions],
            ['convenio', $agreements],
            ['parcelas', '>=', $installments],
        ])
            ->map(function ($fee) use ($lendingValue, $calculateInstallment) {
                $fee->valor_parcela = $calculateInstallment(
                    $lendingValue,
                    $fee->coeficiente
                );

                return $fee;
            })
            ->groupBy('instituicao');
    }
}
