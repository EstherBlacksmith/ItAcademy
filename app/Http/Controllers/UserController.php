<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //create a new player
    public function player(Request $request){
        
        if($request->name <> 'anonimo'){
            $user = User::where('name','=',$request->name)->first();
            if($user <> null){
                return response()->json(['error' => 'The player name in already in use']);
            }
        }

        $user = new User();
        $user->name =$request->name;
        $user->email =  $request->name . rand(0,100) . '@gmail.com';   
        $user->password =  $request->password;
        
        $user->save();
    
        return response()->json(['created' => true,'user' => $user->name]);
    } 

    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();

        return response()->json(['modified' => true]);


    }
}
