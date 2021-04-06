<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FechaGlobalMiddleware
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
        echo '<nav class="navbar navbar-light" style="background-color: #e3f2fd;">';      
        echo "<h3> Fecha Middleware Global: ".date('d-m-y')."</h3>";
        echo "<br>";       
        echo "</nav>";      
        
        return $next($request);
    }
}
