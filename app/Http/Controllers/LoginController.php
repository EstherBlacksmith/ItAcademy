<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }
    
    public function loginAuth(LoginPostRequest $request)
    {
        dd("LOL");
        $validated = $request->validated();
        dd($validated);
        
    }
    
}
