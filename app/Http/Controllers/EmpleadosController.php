<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Tarea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Validator; 
class EmpleadosController extends Controller
{

	public function mostrarEmpleado(Request $request){

		$empleado = Empleado::findOrFail($request->id);	
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

	   $validator = Validator::make($request->all(), [
	        'nombre' => 'required | max:50',
	        'primerApellido' => 'required | max:255',
	        'segundoApellido' => 'required | max:255',
	        'id_tarea' => 'required',

	    ],
   		[
	        'nombre.required' => 'El nombre del empleado es obligatorio',	    
  	        'primerApellido.required' => 'El primer apellido del empleado es obligatorio',	
  	        'segundoApellido.required' => 'El segundo apellido del empleado es obligatorio',	
  	        'id_tarea.required' => 'La tarea es obligatoria',		      
    	]);

   		if ($validator->fails())
        {   
       		return redirect()->back()->withErrors($validator);
        }else{
        	//Si no existe el id, es que el empleado no existe, lo creamos
        	if(!$request->id ) 
        	{
        		$empleado = new Empleado;
        	}else{ 
        		//si existe, lo actualizamos
        		$empleado = Empleado::find($request->id); 
        	}
			
			$empleado->nombre =  $request->input('nombre');
			$empleado->primerApellido =  $request->input('primerApellido');
			$empleado->segundoApellido =  $request->input('segundoApellido');
			$empleado->id_tarea =  $request->input('id_tarea');
			$empleado->save();

			return redirect()->route('show');
		}

	}   	

	
	public function deleteEmpleado(Request $request){
		$id = $request->input('id');
		$empleado = Empleado::findOrFail($id);	
		$empleado->delete();
	    return redirect()->route('show');
    }

}
