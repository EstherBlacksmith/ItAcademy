<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Reserva;
use Carbon\Carbon;
use App\Models\Planta;
use App\Models\Puerta;

use Redirect;
use Illuminate\Validation\Rule;

class HabitacionesController extends Controller{

    public function estructuraHotel(){
        return view('estructuraHotel');

    }

    public function puertasCreate(Request $request){
        $validated = $request->validate([
            'puerta' => 'required|numeric|integer|max:10',
        ]);

        $puerta = puerta::where('puerta','=',$request->puerta)->first(); 

        if (isset($puerta)){
            return redirect::back()->with('existePuerta','Esa puerta ya existe');
        }

        $puerta = new puerta;
        $puerta->puerta = $request->puerta;
        $puerta->save();
            
        return redirect::back()->with('successPuerta', 'Puerta creada correctamente');      


    }

    public function plantasCreate(Request $request){
        $validated = $request->validate([
            'planta' => 'required|numeric|integer|max:10',
        ]);

        $planta = planta::where('planta','=',$request->planta)->first(); 

        if (isset($planta)){
            return redirect::back()->with('existePlanta','Esa planta ya existe');
        }

        $planta = new planta;
        $planta->planta = $request->planta;
        $planta->save();

        return redirect::back()->with('successPlanta', 'Planta creada correctamente');      


    }

    public function habitacionesCreateView(){
    	$habitaciones = Habitacion::orderBy('planta', 'asc')
					                ->orderBy('puerta', 'asc')
					                ->get();

        $plantas = planta::all();
        $puertas = puerta::all();                        
    	return view('habitaciones',compact('habitaciones','plantas','puertas'));
    }

    public function habitacionGet($planta,$puerta){

        $habitacion = habitacion::where('planta_id','=',$planta)
        ->where('puerta_id','=',$puerta)->first();
        return $habitacion;
    }

    public function create($planta_id,$puerta_id,$planta,$puerta,$precio){
     
    	$habitacion = new Habitacion;
        $habitacion->planta = $planta;
     	$habitacion->planta_id = $planta_id;
     	$habitacion->puerta_id = $puerta_id;
        $habitacion->puerta = $puerta;

     	$habitacion->precio = $precio;
     	$habitacion->save();

     	return $habitacion->id;
    }


    public function getReservas($id){
	
		$reserva = Reserva::where('habitacion_id','=',$id)->get(); 

		if($reserva->first()){
           
			return "Esta habitación tiene hechas reservas";
        }

		return 'OK';

    }

     public function habitacionesCreateStore(Request $request){

     	$puertaValidar = $request->puerta_id;
        $plantaValidar = $request->planta_id;

        $habitacion = $this->habitacionGet($plantaValidar,$puertaValidar);

        if (isset($habitacion)){  
         
            return redirect::back()->with('existe', 'Esa habitación ya existe');      
        }

    	$validated = $request->validate([
	        'planta_id' => 'required|numeric|integer|max:15',
	        'puerta_id' => 'required|numeric|integer|max:10',
	        'precio' => 'required|digits_between:0.1,100',	]);
 
	    $planta = Planta::find($request->planta_id);
        $puerta = Puerta::find($request->puerta_id);

		$this->create($request->planta_id,$request->puerta_id,$planta->planta,$puerta->puerta,$request->precio);
  
		    	
		 return back();
    }


    public function habitacionesDelete($id){
    	if ($this->getreservas($id) == 'OK' ){
            $habitacion = habitacion::find($id);
    		$habitacion->forceDelete();
    	}else{
    		return redirect::back()->with('reservas','Esta habitación tiene hechas reservas, no se puede eliminar');
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
