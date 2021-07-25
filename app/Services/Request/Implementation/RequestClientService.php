<?php

namespace App\Services\Request\Implementation;

use App\Services\Request\RequestClientServiceInterface;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class RequestClientService implements RequestClientServiceInterface
{
    protected string $baseUri = '';

    protected function getRequest(): PendingRequest
    {
        return Http::baseUrl($this->baseUri);
    }

    public function setBaseUri(string $baseUri): self
    {
        $this->baseUri = $baseUri;

        return $this;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function get(string $url, ?array $params = []): Response
    {
        return $this->getRequest()->get($url, $params);
    }
}
