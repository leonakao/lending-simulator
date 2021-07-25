<?php

namespace App\Repositories\Fee\Contracts;

use Illuminate\Support\Collection;

interface ListFeeContract
{
    public function __invoke(?array $filters): Collection;
}
