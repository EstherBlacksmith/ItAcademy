<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
{
    /**
    * Passport loginView
    *
    * @return loginView
    */

    public function show(){
        return view('auth/login');
    }

    public function login(Request $request) {
       
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
            $token = $user->createToken('PersonalAccessToken')->accessToken;
            //return  view('home',compact('token'));
            return response()->json($token,200);
        } else {
            return response(['error' => 'Unauthorized']);
        }
                
    }

    public function logout(Request $request) {
        $token = Auth::user()->token();
        $token->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}
