<?php

namespace App\Http\Controllers;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Planta;
use App\Models\Puerta;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function reservaView(){

        $habitaciones = Habitacion::all();
        $plantas = Planta::all();
        $puertas = Puerta::all();
        if( Auth::user()->rol == "admin"){
            $reservas = reserva::All();

        }else{
            $reservas = reserva::where('user_id','=', Auth::user()->id)->get();
        }

        return view('reservas',compact('habitaciones','plantas','puertas','reservas'));
    }

    public function getReservaPorHabitacion($habitacion_id,$fecha){
    	$reserva = Reserva::where('habitacion_id', '=',$habitacion_id)       
    	->where('fecha','=',$fecha)->first();

    	return $reserva;
    }

    public function getReservaPorUsuario($user_id,$fecha){
    	$reserva = Reserva::where('user_id', '=',$user_id)
    	->where('fecha','=',$fecha)->first();

    	return $reserva;
    }

    public function getReservasTodasPorHabitacion($habitacion_id){
    	$reservas = Reserva::where('habitacion_id', '=',$habitacion_id)->get();
    	
    	return $reserva;
    }

    public function getReservasTodasPorUsuario($user_id){
    	$reservas = Reserva::where('user_id', '=',$user_id)->get();
    	
    	return $reserva;
    }

    public function reservaStore(Request $request ){
        $reserva = $this->getReservaPorHabitacion($request->habitacion_id,$request->fecha);

        if (empty($reserva)){
            $reserva = new Reserva();

            $reserva->user_id = Auth::user()->id;
            $reserva->habitacion_id = $request->habitacion_id;
            $reserva->fecha = $request->fecha;
            $reserva->save();
           
            return redirect()->back()->with('success','Reserva realizada correctamente');
        }

        return redirect()->back()->with('errors','Reserva ya existente para esas fechas en esa habitación');

    
    }

    public function  reservaDelete(Request $request){
    	$reserva = reserva::find($request->reserva_id);

    	if(isset ($reserva)){
    		$reserva-> delete();
            return redirect()->back()->with('successDelete','Reserva eliminada correctamente');

    	}
        
        return redirect()->back()->with('errorsDelete','No se ha podido eiminar la reserva');

    }

    public function updateReserva(Request $request){
    	$reserva = reserva::find($request->id);

    	if(isset ($reserva)){
    		
	    	$reserva->user_id = $user_id;
	    	$reserva->habitacion_id = $habitacion_id;
	    	$reserva->fecha = $fecha;
	    	$reserva->save();
	    	
            return redirect()->back()->with('successDelete','Reserva realizada correctamente');

    	}
        
        return redirect()->back()->with('errorsDelete','Reserva ya existente para esas fechas en esa habitación');

    }
}

