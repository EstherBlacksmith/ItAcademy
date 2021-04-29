<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $response = $next($request);

       if (Auth::check()){
            setcookie('nombre', Auth::user()->name , time() + (86400 * 30), "/"); /*1 días*/ 
            setcookie('rol', Auth::user()->rol , time() + (86400 * 30), "/"); /*1 días*/ 
                
            echo  '<div class=" col-1 text-white" style="background-color:rgba(60, 179, 113,0.7);">';
            echo ' <span class="float-left"> Usuari@ '.$_COOKIE['nombre'].'<br> E-mail: '.$_COOKIE['email'].'<br> Rol: '.$_COOKIE['rol'].'</span>';
            echo '</div>';


        }

        return $response; 
        

      
    }
}
