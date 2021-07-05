<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gambling;

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

    /*POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus.*/
    public function games($id){
        $d_1 = rand(1, 6);
        $d_2 = rand(1, 6);

        $game = new Gambling();
        $game->d_1 = $d_1;
        $game->d_2 = $d_2;
        $game->user_id = $id;
        $game->save();

        return response()->json(['games' => $game]);
    }

    /*DELETE /players/{id}/games: elimina les tirades del jugador*/
    public function delete($id){
        $games = gambling::all();

        foreach($games as $game){
            if($game->user_id == $id){
                $game->delete();
            }
        }
        return response()->json(['deleted' => true]); 
    }

    /*GET /players/: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits */
    public function playersList(){
        $score = array();
        $users = User::All();
        
        foreach($users as $player){      
            $score[$player->name] = $this->gamePercent($player->id);                    
        }

        return response()->json(['score' => $score ]);
    }

    /*GET /players/{id}/games: retorna el llistat de jugades per un jugador.*/
    public function mygames($id){
        $games = gambling::where('user_id','=',$id)->get();
        return response()->json(['games' => $games ]);
    }

    /*GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.*/
    public function ranking(){
        $users = User::all();
        $numPlayers = count($users);
        $totalScore = 0;
        $score = 0;
   
        foreach($users as $player){
            $totalScore = $totalScore + ($this->gamePercent($player->id));         
        }

        if ($numPlayers > 0){
            $score = ($numPlayers / $totalScore) * 100;
        }

        return $score;
    }

    /*    GET /players/ranking/winner: retorna el jugador amb millor percentatge d’èxit.*/
    public function winner(){      
        $users = User::All();
        $totalScore = $this->gamePercent(User::first()->id) ;
        $bestUser;

        foreach($users as $player){
            if($this->gamePercent($player->id) >=  $totalScore) {     
                
                $totalScore = $this->gamePercent($player->id);
                $bestUser = $player->name;
            }           
        }

        return response()->json(['bestPlayer' => $player ]);

    }

    /*    GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit*/
    public function loser(){

        $users = User::All();
        $totalScore = $this->gamePercent(User::first()->id) ;
        $worstUser;  

        foreach($users as $player){
            
            if($this->gamePercent($player->id) <=  $totalScore) {
                $totalScore = $this->gamePercent($player->id);
                $worstUser = $player;
            }
        }

        return response()->json(['worstPlayer' => $player->name ]);

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
