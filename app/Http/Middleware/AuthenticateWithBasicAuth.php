<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateWithBasicAuth
{
    public function handle(Request $request, Closure $next)
    {
        return $this->authenticate($request) ?: $next($request);
    }

    protected function authenticate(Request $request)
    {
        $auth = $request->getUser();

        if (! $auth || ! $this->validateCredentials($auth, $request->getPassword())) {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        return null;
    }

    protected function validateCredentials($username, $password)
    {
        // Implement your own logic to validate the username and password.
        // Example:
        return $username === 'Tours-user' && $password === 'L3tM3L00kd';
    }
}