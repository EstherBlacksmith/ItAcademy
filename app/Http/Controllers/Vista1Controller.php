<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vista1Controller extends Controller
{
    public function get()
    {
        return view('vista1');
    }
    
    public function saludo($nom= "Pepe")
    {
        //return "Bienvenido $nom!!";
        
       // return view('vista1', array('nom' => $nom));
        
        return view('vista1')->with('nom', $nom);
    }
}
