<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AuthMiddleware
{
    public function handle(Request $request, Closure $next, string $guard = 'sanctum'): Response
    {
        if (!$request->user($guard)) {
            return response()->json([ 'message' => 'Unauthorized',], 401);
        }

        return $next($request);
    }
}
