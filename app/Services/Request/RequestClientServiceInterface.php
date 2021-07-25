<?php

namespace App\Services\Request;

interface RequestClientServiceInterface
{
    public function setBaseUri(string $baseUri);

    public function get(string $url, ?array $params);
}
