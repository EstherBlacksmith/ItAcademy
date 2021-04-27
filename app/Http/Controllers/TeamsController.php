<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use  App\Models\Team;

class TeamsController extends Controller
{
     public function index(){

     	$equipos = team::all();
    	return view ('equipos.equiposIndex',compact('equipos'));
    }

    public function update($id){

     	$equipo = team::find($id);
    	return view ('equipos.equiposUpdate',compact('equipo'));
    }

    public function equiposUpdateStore(Request $request){

        $validated =  $request->validate([
            'ciudad'=>'required|max:100',
            'estadio'=>'required|max:255',
            'foundation_year'=>'required|date',
        ]);
    
        $equipo = Team::find($request->id);

        if($equipo){

            $equipo->stadium = $request->estadio;
            $equipo->city = $request->ciudad;
            $equipo->foundation_year = $request->foundation_year;
            $equipo->save();
        }

       return($this->index());

    }

    public function equiposCreate(){
        return view('equipos.equiposCreate');
    }
 
    public function equiposCreateStore(Request $request){

        $validated =  $request->validate([
            'ciudad'=>'required|max:100',
            'estadio'=>'required|max:255',
            'foundation_year'=>'required|date',
        ]);
    
        $equipo = new Team();

        $equipo->stadium = $request->estadio;
        $equipo->city = $request->ciudad;
        $equipo->foundation_year = $request->foundation_year;
        $equipo->save();    

        return($this->index());

    }
    public function equiposDelete($id){
        $equipo = Team::find($id);

        if($equipo){
            $equipo->delete();    
        }

        return Redirect::back();
    }
}
