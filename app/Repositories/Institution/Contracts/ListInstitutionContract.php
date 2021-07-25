<?php

namespace App\Repositories\Institution\Contracts;

use Illuminate\Support\Collection;

interface ListInstitutionContract
{
    public function __invoke(): Collection;
}
