<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\matches;
use App\Models\Team;

class MatchesController extends Controller
{
  
   	public function index(){   	

     	$partidos = matches::all();

     	$partidosEquipos = array();

        foreach ($partidos as $partido ) {

            $equipos = team::find($partido->teams_id);

            if ($equipos){
                $partidosEquipos[$partido->id] = $equipos->city;
            }
        }

    	return view ('partidos.partidosIndex',compact('partidos','partidosEquipos'));
    }

    public function partidosUpdate($id){

     	$partido = matches::find($id);
     	$equipos = team::all();

    	return view ('partidos.partidosUpdate',compact('partido','equipos'));
    }

    public function partidosUpdateStore(Request $request){

        $validated =  $request->validate([
            'local_gol'=>'required',
            'visitor_gol'=>'required',
            'date'=>'required|date',
            'id' => 'required',
        ]);
    
        $partido = matches::find($request->id);

        if($partido){

            $partido->local_gol = $request->local_gol;
            $partido->visitor_gol = $request->visitor_gol;
            $partido->date = $request->date;
            $partido->teams_id = $request->id;
            $partido->save();
        }

       return($this->index());

    }

    public function partidosCreate(){
        return view('partidos.partidosCreate');
    }
 
    public function partidosCreateStore(Request $request){

        $validated =  $request->validate([
            'local_gol'=>'required',
            'visitor_gol'=>'required',
            'date'=>'required|date',
        ]);
    
        $partido = new matches();

        $partido->stadium = $request->estadio;
        $partido->city = $request->ciudad;
        $partido->foundation_year = $request->foundation_year;
        $partido->save();    

        return($this->index());

    }
    public function partidoosDelete($id){
        $partido = matches::find($id);

        if($partido){
            $partido->delete();    
        }

        return Redirect::back();
    }
}
