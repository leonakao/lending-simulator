<?php

namespace App\Services\Request;

interface RequestClientServiceInterface
{
    public function setBaseUri(string $baseUri);

    public function post(string $url, ?array $params);

    public function get(string $url, ?array $params);
}
