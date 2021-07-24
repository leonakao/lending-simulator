<?php

namespace App\Repositories\Institution;

use Illuminate\Support\Collection;

interface IInstitutionListRepository
{
    public function __invoke(): Collection;
}
