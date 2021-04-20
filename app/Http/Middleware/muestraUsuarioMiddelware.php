<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class muestraUsuarioMiddelware
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

            $user = User::where('email',$request->cookie('email')) -> first();
            echo '<nav class="navbar navbar-light text-dark" >';      
            echo "Hola " . $user->name;
            echo "</nav>"; 

            return $next($request);    
        }     
        else{
            echo '<nav class="navbar navbar-light text-dark" >';      
            echo "¡Hola!, Inicia sesión";
            echo "</nav>"; 

        } 
       
        return $next($request);
    }
}
