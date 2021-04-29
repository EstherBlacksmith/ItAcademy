<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
use  App\Models\Team;
use  App\Models\Matches;


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
        ],
        $messages = [
            'ciudad.required' => 'Es necesario indicar la ciudad del equipo',
            'estadio.required' => 'Es necesario indicar el estadio',
            'foundation_year.required' => 'Es necesario indicar la fecha de fundación',
            
        ],
    );
    
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
        ],
        $messages = [
            'ciudad.required' => 'Es necesario indicar la ciudad del equipo',
            'estadio.required' => 'Es necesario indicar el estadio',
            'foundation_year.required' => 'Es necesario indicar la fecha de fundación',
            
        ],
    );
    
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

            $matches = matches::whereIn('teams_id', array($equipo->id))->get();
            foreach ($matches as $match ) {
                $match->delete();
            }

            $equipo->delete();    
        }

        return Redirect::back();
    }
}
