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
        $fees = $this
            ->setFileName(self::FILE_NAME)
            ->getFileContent();

        $institutions = Arr::get($filters, 'institutions', []);
        if (count($institutions) > 0) {
            $fees = $fees->whereIn('instituicao', $institutions);
        }

        $agreements = Arr::get($filters, 'agreements', []);
        if (count($agreements) > 0) {
            $fees = $fees->whereIn('convenio', $agreements);
        }

        $installments = Arr::get($filters, 'installments', 0);
        if ($installments > 0) {
            $fees = $fees->filter(function ($fee) use ($installments) {
                return $fee->parcelas >= $installments;
            });
        }

        return $fees->flatten();
    }
}
