<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //create a new player
    public function player(){
        
        $user = new User();
        $user->name = 'anonymous';
        $user->email = strval( rand(1,100) ) . '@gmail.com';     
     
        return response()->json(['created' => true]);

    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();

        return response()->json(['modified' => true]);


    }
}
