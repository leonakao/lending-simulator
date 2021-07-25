<?php

namespace App\Repositories\Institution\Actions;

use App\Repositories\Institution\Contracts\ListInstitutionContract;
use App\Repositories\Institution\InstitutionBaseRepository;

use Illuminate\Support\Collection;

class ListInstitutionRepository extends InstitutionBaseRepository implements ListInstitutionContract
{
    public function __invoke(): Collection
    {
        return $this
            ->setFileName(self::FILE_NAME)
            ->list();
    }
}
