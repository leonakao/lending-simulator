<?php

namespace App\Repositories;

use App\Utils\ReadJsonFile;

use Illuminate\Support\Collection;

abstract class BaseRepository
{
    private $fileReader;
    private $fileName;
    private $filters = [];

    public function __construct(ReadJsonFile $fileReader)
    {
        $this->fileReader = $fileReader;
    }

    protected function getFileContent(): Collection
    {
        return $this->fileReader->getFileContent($this->getFileName());
    }

    protected function getFileName(): string
    {
        return $this->fileName;
    }

    protected function getFilters(): array
    {
        return $this->filters;
    }

    protected function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    protected function setFilters(array $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    public function list(): Collection
    {
        $items = $this->getFileContent();

        foreach ($this->getFilters() as $filter) {
            if (count($filter) > 2) {
                $items = $items->where($filter[0], $filter[1], $filter[2]);

                continue;
            }

            if (is_array($filter[1])) {
                if (count($filter[1]) > 0) {
                    $items = $items->whereIn($filter[0], $filter[1]);
                }

                continue;
            }

            $items = $items->where($filter[0], $filter[1]);
        }

        return $items->flatten();
    }
}
