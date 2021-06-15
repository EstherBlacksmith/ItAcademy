<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
{
    /**
    * Passport loginView
    *
    * @return loginView
    */

    public function loginView(){
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
            $token = auth()->user()->createToken('Personal Access Token')->accessToken;
            return  view('home',compact('token'));


            //return response()->json(['token' => $token], 200);
        } else {
            abort(404);
           // return response(['error' => 'Unauthorized']);
            //return response()->json(['error' => 'Unauthorized'], 401);
        }
                
    }

    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('Personal Acces Token')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request) {
        $token = Auth::user()->token();
        $token->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}