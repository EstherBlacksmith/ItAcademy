<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioDatosCOntroller extends Controller
{
    public function usuario(){
        return view ('auth.login');

    }
    public function usuarioDatos(Request $request){

        //recuperamos los valores del POST
        $email = $request->input('email');
        $password = $request->input('password');

        //Si consideramos que son válidos, dejamos continuar
        if ($email <> "" and $password <> ""){
           $email_cookie = cookie()->forever('email', $email);
          
           return response(view('auth.loginOK'))->withCookie($email_cookie);
        }else{
            return view('auth.login');
        }
    }
    
    public function usuarioDatosRegister(Request $request) {
        //recuperamos los valores del POST
        $email = $request->input('email');
        $password = $request->input('password');

        //Si consideramos que son válidos, dejamos continuar
        if ($email <> "" and $password <> ""){
            $email_cookie = cookie()->forever('email', $email);
            
            return view('auth.loginOK2');
        }else{
            return view('auth.register');
        }
        
    }
    
    public function usuarioDatosReset(Request $request) {
        //recuperamos los valores del POST
        $email = $request->input('email');
        $password = $request->input('password');

        //Si consideramos que son válidos, dejamos continuar
        if ($email <> ""){
            $email_cookie = cookie()->forever('email_cookie', $email);
            return view('auth.loginOK3');
        }else{
            return view('auth.resetPassword');
        }
        
    }
}
