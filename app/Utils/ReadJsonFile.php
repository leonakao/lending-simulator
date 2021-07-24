<?php

namespace App\Utils;

use Illuminate\Support\Collection;

class ReadJsonFile
{
    public function getFileContent($file): Collection
    {
        $jsonString = file_get_contents(database_path("dumps/{$file}.json"));

        return collect(json_decode($jsonString, true));
    }
}
