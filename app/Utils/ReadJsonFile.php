<?php

namespace App\Utils;

use Illuminate\Support\Collection;

class ReadJsonFile
{
    protected $basePath = '';

    public function setBasePath(string $path): self
    {
        $this->basePath = $path;

        return $this;
    }

    public function getFileContent(string $file): Collection
    {
        $jsonString = file_get_contents($this->basePath . "/{$file}.json");

        return collect(json_decode($jsonString, false));
    }
}
