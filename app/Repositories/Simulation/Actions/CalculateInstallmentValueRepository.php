<?php

namespace App\Repositories\Simulation\Actions;

use App\Repositories\Simulation\Contracts\CalculateInstallmentValueContract;
use App\Repositories\Simulation\SimulationBaseRepository;

class CalculateInstallmentValueRepository extends SimulationBaseRepository implements CalculateInstallmentValueContract
{
    const PRECISION = 2;

    public function __invoke(float $lendingValue, float $coefficient): float
    {
        $totalValue = $lendingValue * $coefficient;

        return round($totalValue, self::PRECISION);
    }
}
