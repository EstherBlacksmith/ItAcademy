<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadosController extends Controller
{
    public function storeEmpleado(Request $request)
    {
	    $validated = $request->validate([
	        'nombre' => 'required | max:50',
	        'primerApellido' => 'required | max:255',
	        'segundoApellido' => 'required | max:255',
	        'id_tarea' => 'required',

	    ],
   		[
	        'nombre.required' => 'El nombre del empleado es obligatorio',	    
  	        'primerApellido.required' => 'El nombre del empleado es obligatorio',	
  	        'id_tarea.required' => 'La tarea es obligatoria',	        
    

    	]);

		$empleado = new Empleado;
		$empleado->nombre =  $request->input('nombre');
		$empleado->primerApellido =  $request->input('primerApellido');
		$empleado->segundoApellido =  $request->input('segundoApellido');
		$empleado->id_tarea =  $request->input('id_tarea');
		$empleado->save();

		return redirect()->route('createEmpleadoOK');
	}    
}
