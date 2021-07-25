<?php

namespace App\Repositories\Agreement\Actions;

use App\Repositories\Agreement\Contracts\ListAgreementContract;
use App\Repositories\Agreement\AgreementBaseRepository;

use Illuminate\Support\Collection;

class ListAgreementRepository extends AgreementBaseRepository implements ListAgreementContract
{
    public function __invoke(?array $filters = []): Collection
    {
        $agreements = $this
            ->setFileName(self::FILE_NAME)
            ->getFileContent();

        if (count($filters) > 0) {
            $agreements = $agreements->filter(function ($agreement) use ($filters) {
                return in_array($agreement->valor, $filters);
            })
                ->flatten();
        }

        return $agreements;
    }
}
