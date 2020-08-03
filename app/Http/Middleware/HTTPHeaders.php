<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class HTTPHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug($request);
        $request->header('X-XSS-Protection', '1; mode=block');
        $request->header('Cache-Control', 'no-cache; must-revalidate; max-age=0');
        $request->header('X-Frame-Options', 'DENY');
        $request->header('X-Content-Type-Options', 'nosniff');
        $response = $next($request);
        return $response;
    }
}
