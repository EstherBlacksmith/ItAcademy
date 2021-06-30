<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Cookie;
use Closure;
use Illuminate\Http\Request;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Cookie::get('token')) {
            $request->headers->set('Authorization', 'Bearer ' . Cookie::get('token'));
        }
        return $next($request);
    }
}
