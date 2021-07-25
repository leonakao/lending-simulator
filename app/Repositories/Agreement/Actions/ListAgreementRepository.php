<?php

namespace App\Repositories\Agreement\Actions;

use App\Repositories\Agreement\Contracts\ListAgreementContract;
use App\Repositories\Agreement\AgreementBaseRepository;

use Illuminate\Support\Collection;

class ListAgreementRepository extends AgreementBaseRepository implements ListAgreementContract
{
    public function __invoke(): Collection
    {
        return $this
            ->setFileName(self::FILE_NAME)
            ->getFileContent();
    }
}
