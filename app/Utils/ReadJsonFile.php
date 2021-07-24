<?php

namespace App\Utils;

use Illuminate\Support\Collection;

class ReadJsonFile
{
    protected $filePath;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function getFileContent(): Collection
    {
        $jsonString = file_get_contents(database_path("dumps/{$this->file}.json"));

        return collect(json_decode($jsonString, true));
    }
}
