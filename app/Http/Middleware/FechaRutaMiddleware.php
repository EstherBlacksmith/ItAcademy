<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FechaRutaMiddleware
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
        echo '<nav class="navbar navbar-dark" style="background-color: lightblue;">';     
        echo "<h6> Fecha Middleware por Ruta: ".date('d-m-y')."</h6>";
        echo "<br>";       
        echo "</nav>";   

        return $next($request);
    }
}
