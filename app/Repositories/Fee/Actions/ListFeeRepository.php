<?php

namespace App\Repositories\Fee\Actions;

use App\Repositories\Fee\Contracts\ListFeeContract;
use App\Repositories\Fee\FeeBaseRepository;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ListFeeRepository extends FeeBaseRepository implements ListFeeContract
{
    public function __invoke(?array $filters = []): Collection
    {
        return $this
            ->setFileName(self::FILE_NAME)
            ->setFilters($filters)
            ->list();
    }
}
