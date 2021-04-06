<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\UsuarioDatosCOntroller;

class DatosUsuarioMiddleware
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
        if($request->hasCookie('email')) {
            echo '<nav class="navbar navbar-light" style="background-color: #e3f2fd;">';      
            echo "Usuario " . $request->cookie('email');
            echo "</nav>"; 
            return $next($request);    
        }      
       
        return $next($request);
    }
}
