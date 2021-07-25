<?php

namespace App\Http\Middleware;

use App\Services\Authentication\AuthenticationServiceInterface;

use Closure;
use Illuminate\Http\Request;

class Authentication
{
    protected $authenticationService;

    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $this->authenticationService->isAuthenticated()) {
            abort(401);
        }

        return $next($request);
    }
}
