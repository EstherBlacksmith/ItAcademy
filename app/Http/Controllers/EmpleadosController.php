<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Tarea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class EmpleadosController extends Controller
{

	public function mostrarEmpleado($id){
		$empleado = Empleado::findOrFail($id);	
		$tareas = Tarea::all();
	    return view('empleados.update', ['empleado' => $empleado,'tareas' => $tareas]);
    }


    public function filtraEmpleado(Request $request){    	

		$tareas = Tarea::all();
		
    	if($request->id_tarea == null){
    		$empleados = Empleado::all();
    	}else{
	    	$empleados =  DB::table('empleados')
	    				->where('empleados.id_tarea',$request->id_tarea)
	    				->get();	

		}

	    return view('empleados.show', ['empleados' => $empleados,'tareas' => $tareas]);		
	    
    }


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

		return redirect()->route('show');
	}    


	public function updateEmpleado(Request $request)
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
	
		Empleado::find($request->id)->update($validated);   
		return redirect()->route('show');
	}    

	public function deleteEmpleado($id){
		$empleado = Empleado::findOrFail($id);	
		$empleado->delete();
	    return redirect()->route('show');
    }

}
