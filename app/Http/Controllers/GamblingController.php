<?php

namespace App\Http\Controllers;

use  App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Gambling;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


/**
 * POST: /players : crea un jugador
 * PUT /players/{id} : modifica el nom del jugador
 * POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus.
 * DELETE /players/{id}/games: elimina les tirades del jugador
 * GET /players/: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits 
 * GET /players/{id}/games: retorna el llistat de jugades per un jugador.
 * GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.
 * GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit
 * GET /players/ranking/winner: retorna el jugador amb pitjor percentatge d’èxit.
 */

class GamblingController extends Controller
{       
    public function shake(){        
        return view('playing');
    }

    /*POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus.*/
    public function games($id){   

        $d_1 = rand(1, 6);
        $d_2 = rand(1, 6);

        $game = new Gambling();
        $game->d_1 = $d_1;
        $game->d_2 = $d_2;
        $game->user_id = $id;
        $game->save();

        return response()->json(['d_1' => $d_1, 'd_2' => $d_2]);
    }

    /*DELETE /players/{id}/games: elimina les tirades del jugador*/
    public function Delete($id){
        if(Auth::user()->hasRole('admin')){ //role control
            $games = gambling::all();

            foreach($games as $game){
                if($game->user_id == $id){
                    $game->delete();
                }
            }
            return response()->json(['deleted' =>  "All the games from current user has been deleted"]); 

        }else{
            return response()->json(['deleted' => 'The current user need permissions']); 
        }

        
    }

    /*GET /players/: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits */
    public function playersList(){
        if(Auth::user()->hasRole('admin')){ //role control
            $score = array();
            $users = User::All();
            
            foreach($users as $player){      
                $score[$player->name] = $this->gamePercent($player->id);                    
            }

            return response()->json(['score' => $score ]);
        }else{
            return response()->json(['score' => 'The current user need permissions']); 
        }
    }

    /*GET /players/{id}/games: retorna el llistat de jugades per un jugador.*/
    public function mygames($id){
        $games = gambling::where('user_id','=',$id)->get('d_1','d_2');

        return response()->json(['games' => $games ]);
    }

    /*GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.*/
    public function ranking(){
        if(Auth::user()->hasRole('admin')){ //role control

            $users = User::all();
            $numPlayers = count($users);
            $totalScore = 0;
            $score = 0;
    
            foreach($users as $player){
                $totalScore = $totalScore + ($this->gamePercent($player->id));         
            }

            if ($numPlayers > 0 && $totalScore > 0){
                $score = ($numPlayers / $totalScore) * 100;
            }
            return response()->json(['score' => $score ]);
        }else{
            return response()->json(['score' => 'The current user need permissions']); 
        }
    }

    /*    GET /players/ranking/winner: retorna el jugador amb millor percentatge d’èxit.*/
    public function winner(){      
        $users = User::All();
        $totalScore =0 ;
        $bestUser;

        foreach($users as $player){
            if($this->gamePercent($player->id) >=  $totalScore) {     
          
                $totalScore = $this->gamePercent($player->id);
                $bestUser = $player;
            }           
        }
        return response()->json(['bestPlayer' => $bestUser->name, 'totalScore' => $totalScore ]);
    }

    /*    GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit*/
    public function loser(){

        $users = User::All();
        $totalScore = 100;
        $worstUser;  

        foreach($users as $player){
            
            if($this->gamePercent($player->id) <=  $totalScore) {
                $totalScore = $this->gamePercent($player->id);
                $worstUser = $player;
            }
        }

        return response()->json(['worstPlayer' => $worstUser->name, 'totalScore' => $totalScore ]);

    }

    public function gamePercent($id){
        $totalGames = 0;
        $wins = 0;
        $score = 0;

        $games = gambling::where('user_id','=',$id)->get();
        $totalGames = count($games);

        foreach($games as $game){
            if(($game->d_1 + $game->d_2) == 7 ){
                $wins ++;             
            }                      
        }
        if ($wins > 0){
            $score = ($totalGames / $wins) * 100;
        }      

        return $score;

    }

}
