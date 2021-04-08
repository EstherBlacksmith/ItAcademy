<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Tarea;


class TareasController extends Controller
{
	

	public function mostrarTarea(){
		$tareas = DB::table('tareas')->get();
	    return view('empleados.createTarea', ['tareas' => $tareas]);
    }

	public function mostrarEmpleado(){
		$tareas = DB::table('tareas')->get();   
		return view('empleados.create', ['tareas' => $tareas]);
    }

   public function store(Request $request)
   {
  
	    $validated = $request->validate([
	        'tarea' => 'required | max:255',
	        'descripcion' => 'required | max:255',
	    ],
   		[
         	'tarea.required' => 'El nombre de la tarea es obligatorio',	        
	        'descripcion.required' => 'La descripción es obligatoria',	    
    	]);


		$tarea = new Tarea;
		$tarea->tarea =  $request->input('tarea');
		$tarea->descripcion =  $request->input('descripcion');
		$tarea->save();

		return redirect()->route('createTarea');
	}
  
}
