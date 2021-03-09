<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
   public function index()
    {
        return view('departamento');
    }
     
    public function store()
    {
        dd('Hola Nancy!');
        return view('departamento');
    }
    
    public function show($pais,$departamento)    
    {
        return "Has mostrado $departamento del país $pais";
    }
    
    public function update($pais,$departamento)
    {
        return "Has actualizado $departamento del país $pais";
    }
    
    public function destroy($pais,$departamento)
    {
        return "Has eliminado $departamento del país $pais";
    }
}
