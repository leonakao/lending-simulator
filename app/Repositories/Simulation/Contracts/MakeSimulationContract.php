<?php

namespace App\Repositories\Simulation\Contracts;

use Illuminate\Support\Collection;

interface MakeSimulationContract
{
    public function __invoke(array $options): Collection;
}
