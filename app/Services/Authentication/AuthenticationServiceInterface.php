<?php

namespace App\Services\Authentication;

interface AuthenticationServiceInterface
{
    public function isAuthenticated(): bool;
}
