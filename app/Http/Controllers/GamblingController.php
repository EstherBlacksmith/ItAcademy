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
    

    public function games($id){
        $d1 = rand(1, 6);
        $d2 = rand(1, 6);

        $game = new Gambling();
        $game->d_1 = d1;
        $game->d_2 = d2;
        $game->user_id = $id;
        $game->save();

        return response()->json(['games' => $game]);
    }

    public function delete($id){
        $games = gambling::all();

        foreach($games as $game){
            if($game->user_id == $id){
                $game->delete();
            }
        }
        return response()->json(['deleted' => true]); 
    }

    public function PlayersList(){
        $users = User::All();

        return response()->json(['Users' => $users ]);
    }

    public function mygames($id){
        $games = gambling::find()->where('user_id','=',$id);

        return response()->json(['games' => $games ]);
    }

    public function ranking(){


    }

    public function winner(){
        $game = Gambling::orderBy('');
      /*  Post::orderBy('id', 'DESC')->get();*/

        return response()->json(['games' => $games ]);

    }

    public function loser(){


    }


}
