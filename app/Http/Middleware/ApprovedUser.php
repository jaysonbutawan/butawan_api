<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApprovedUser
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized',], 401);
        }

        if (!$user->email_verified_at) {
            return response()->json([
                'status' => 'NOT_APPROVED',
                'message' => 'Account is not approved yet.',
            ], 403);
        }

        return $next($request);
    }
}
