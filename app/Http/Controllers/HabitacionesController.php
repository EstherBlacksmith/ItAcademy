<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Reserva;
use Carbon\Carbon;
use Redirect;
use Illuminate\Validation\Rule;

class HabitacionesController extends Controller
{
    public function habitacionesCreateView(){
    	$habitaciones = Habitacion::orderBy('planta', 'desc')
					                ->orderBy('puerta', 'asc')
					                ->get();
    	return view('habitaciones',compact('habitaciones'));
    }

    public function create($planta,$puerta,$precio){

		$habitacion = new Habitacion;
     	$habitacion->planta = $planta;
     	$habitacion->puerta = $puerta;
     	$habitacion->precio = $precio;
     	$habitacion->save();

     	return $habitacion->id;
    }


    public function getReservas($id){
    	$habitacion = Habitacion::find($id);

		if($habitacion){
			$reserva = Reserva::where('habitacion_id','=',$habitacion->id)
						->where('fecha','=>',Carbon::today()->format('Y-m-d'))->first(); 
			if($reserva != null){
				return back()->withErrors('Esta habitación tiene hechas reservas');
			}

		}

		return 'OK';

    }

     public function habitacionesCreateStore(Request $request){

     	$puertaValidar = $request->puerta;
        $plantaVAlidar = $request->planta;

     	$validated = $request->validate([
	        'planta' => 'numeric|integer|max:15',
	        'puerta' => 'required|numeric|integer|max:10',
	        'precio' => 'required|numeric|min:1',
            'planta' => ['required', Rule::unique('habitaciones')->where(
                function ($query) {
                    return $query->where('puerta',$request->puerta);           
                })],
            'puerta' =>['required', Rule::unique('habitaciones')->where(
                function ($query) {
                    return $query->where('planta',$request->planta);           
                })],


        	]);
 
		/*$habitacion = Habitacion::where('planta', '=', $request->planta)     
							    ->where('puerta', '=', $request->puerta)->first();


		if($habitacion){
            return Redirect::back()->withErrors(['existe', 'Esa habitación ya existe']);
		}
*/
		
		$this->create($request->planta,$request->puerta,$request->precio);
  
		    	
		 return back();
    }


    public function habitacionesDelete($id){

    	if ($this->getreservas($id) == 'OK' ){
            $habitacion = habitacion::find($id);
    		$habitacion->forceDelete();
    	}else{
    		return back()->withErrors('Esta habitación tiene hechas reservas, no se puede eliminar');
    	}

		return back();
    }

 	public function habitacionesUpdate(Request $request, $id){	
    

 		$validated = $request->validate([
	        'precioEdit' => 'required|numeric',
    	]);

 		if ($this->getreservas($id) == 'OK' ){

            $habitacion = Habitacion::find($id);
 			$habitacion->precio = $request->precioEdit;
            $habitacion->save();
    		
    	}else{
    		return back()->withErrors('Esta habitación tiene hechas reservas, no se puede modificar');
    	}
	    
    	return back();

    }
   
}
