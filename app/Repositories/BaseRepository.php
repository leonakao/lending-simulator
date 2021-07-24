<?php

namespace App\Repositories;

use App\Utils\ReadJsonFile;

use Illuminate\Support\Collection;

class BaseRepository
{
    protected $fileReader;
    protected $fileName;

    public function __construct(ReadJsonFile $fileReader)
    {
        $this->fileReader = $fileReader;
    }

    protected function getFileContent(): Collection
    {
        return $this->fileReader->getFileContent($this->fileName);
    }

    protected function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }
}
