<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; 


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    { 

       $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required',
            'password_confirmation'=>'required',

        ],
        [
            'name.required' => 'El nombre de usuario es obligatorio',       
            'email.required' => 'El email es obligatorio',  
            'password.required' => 'La contraseña es obligatoria',    
            'password_confirmation.required' => 'La contraseña confirmada es obligatoria',    

        ]);

      
       if ($validator->fails())
        {   return redirect()->back()->withErrors($validator);
        }else{           
            
            Auth::login($user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]));

            event(new Registered($user));
            return redirect(RouteServiceProvider::HOME);
        }     
           

    }
}
