<?php

namespace App\Repositories\Agreement\Contracts;

use Illuminate\Support\Collection;

interface ListAgreementContract
{
    public function __invoke(): Collection;
}
