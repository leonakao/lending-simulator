<?php

namespace App\Repositories\Institution\Actions;

use App\Repositories\Institution\Contracts\ListInstitutionContract;
use App\Repositories\Institution\InstitutionBaseRepository;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ListInstitutionRepository extends InstitutionBaseRepository implements ListInstitutionContract
{
    public function __invoke(?array $filters = []): Collection
    {
        $institutions = $this
            ->setFileName(self::FILE_NAME)
            ->getFileContent();

        if (count($filters) > 0) {
            $institutions = $institutions->filter(function ($institution) use ($filters) {
                return in_array($institution->valor, $filters);
            })
                ->flatten();
        }

        return $institutions;
    }
}
