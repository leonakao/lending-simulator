<?php

namespace App\Repositories\Simulation\Contracts;

interface CalculateInstallmentValueContract
{
    public function __invoke(
        float $lendingValue,
        int $installments,
        float $coefficient
    ): float;
}
