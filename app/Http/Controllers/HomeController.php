<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $token = $request->token;
        
        return view('home',compact('token'));
    }
}
