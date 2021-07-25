<?php

namespace App\Services\Authentication\Implementation;

use App\Services\Authentication\AuthenticationServiceInterface;
use App\Services\Request\RequestClientServiceInterface;

class AuthenticationService implements AuthenticationServiceInterface
{
    protected $requestService;

    public function __construct(RequestClientServiceInterface $requestService)
    {
        $this->requestService = $requestService
            ->setBaseUri(config('auth.authenticator_service'));
    }

    public function isAuthenticated(): bool
    {
        $response = $this->requestService
            ->get('/v3/73ab1ec3-b281-4f6d-b670-0f08bca2dadb');

        $body = $response->json();

        return $response->getStatusCode() === 200
            && $body['message'] === 'authenticated';
    }
}
