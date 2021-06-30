<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambling;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*El joc de daus s’hi juga amb dos daus. En cas que el resultat dels dos daus sigui 7, la partida és guanyada, sinó és perduda. Per poder jugar al joc, 
    t’has de registrar com a jugador amb un nom. Un jugador pot veure un llistat de totes les tirades que ha fet i el percentatge d’èxit.

    Per poder realitzar una tirada, un usuari s’ha de registrar amb un nom no repetit. Al crear-se, se l’hi assigna un identificador numèric únic i una data de registre. 
    Si l’usuari així ho desitja, pots no afegir cap nom i es dirà “ANÒNIM”. Pot haver-hi més d’un jugador “ANÒNIM”.

    Cada jugador pot veure un llistat de totes les tirades que ha fet, amb el valor de cada dau i si s’ha guanyat o no la partida. 
    A més, pot saber el seu percentatge d’èxit per totes les tirades que ha realitzat. 

    No es pot eliminar una partida en concret, però si que es pot eliminar tot el llistat de tirades per un jugador.

    El software ha de permetre llistar tots els jugadors que hi ha al sistema, el percentatge d’èxit de cada jugador i el percentatge d’èxit mig de tots els jugadors en el sistema.*/



class GamblingController extends Controller
{
    public function play(Request $request){
        $token = $request->token;            
        return view('play',compact('token'));        
    }

    public function getResult(){
        return rand(1, 6);
    }

    public function sumDices(){
        $result = $this->getResult() + $this->getResult();
        return $result;
    }

    public function setResult(Request $request){
       // $token = $request->token; 
        $d1 = $this->getResult();
        $d2 =$this->getResult();
        $result = $d2 + $d1;

        $this->storeMove($d1,$d2);
        return $result;
    }

    public function storeMove($d1,$d2){ 
        $user = Auth::user();
        dd( $user);
        $move = new Gambling();
        $move->user_id =  $user->id; 
        $move->d_1 = $d1; 
        $move->d_2 = $d2; 
        $move->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function mygames(){
        dd(\Auth::id());
        $user = \Auth::guard('api')->user();
        return $user->moves();
    }

    public function getPercen(int $userId){
        $total = 0;
        $numMoves = 0;
        $moves = $this->getMoves($userId);
        
        foreach($moves as $move){
            if ($move->d1 + $move->d2 >= 7){
                $total = $total + 1;
            }
            $numMoves = $numMoves + 1;
        }

        return ($total / $numMoves);

    }

    public function getGlobalPercen(){
        $total = 0;
        $numMoves = 0;
        $moves = Gambling::all();
        
        foreach($moves as $move){
            if ($move->d1 + $move->d2 >= 7){
                $total = $total + 1;
            }
            $numMoves = $numMoves + 1;
        }

        return ($total / $numMoves);

    }


    public function eraseAll(int $userId){

        $moves = $this->getMoves($userId);

        foreach($moves as $move){
            $move::delete();
        }
        if (!$moves){
            return response()->json([
                'success' => true
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => "Can't delete all moves"
            ]);
        }        
    }

   
    
 

}
