<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        return view('paises');
    }
     
    public function store()
    {       
        //return "Has almacenado $pais";
        return view('paises');
    }
    
    public function show($pais)
    {
        return "Has mostrado $pais";
    }
    
    public function update($pais)
    {
        return "Has actualizado $pais";
    }
    
    public function destroy($pais)
    {
        return "Has eliminado $pais";
    }
    
}
