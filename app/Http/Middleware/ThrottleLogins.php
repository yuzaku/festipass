<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class ThrottleLogins
{
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'message' => "Terlalu banyak percobaan login. Coba lagi dalam {$seconds} detik."
            ], 429);
        }

        $response = $next($request);

        if ($request->routeIs('login.attempt') && $response->getStatusCode() === 302 && $response->headers->get('location') === $request->url()) {
            RateLimiter::hit($key);
        }

        return $response;
    }
}
