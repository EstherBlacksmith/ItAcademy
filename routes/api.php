<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GamblingController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/login',function(){
    return view('login');
})->name('loginView');

Route::post('login', [AuthController::class,'login'])->name('login');

Route::middleware('jwt.auth')->group(function () {   

    /*  POST: /players : crea un jugador*/
    Route::post('players', [UserController::class,'player'])->name('player');

    /*  PUT /players/{id} : modifica el nom del jugador*/
    Route::put('player/{id}', [UserController::class,'update'])->name('player');
    
    /*POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus.*/
    Route::post('/players/{id}/games', [GamblingController::class,'shake'])->name('shake');

    Route::post('/players/{id}/games', [GamblingController::class,'games'])->name('games');

    /*  DELETE /players/{id}/games: elimina les tirades del jugador*/
    Route::delete('/players/{id}/games', [GamblingController::class,'delete'])->name('delete');

    /* GET /players/: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits */
    Route::get('/players', [GamblingController::class,'PlayersList'])->name('players');

    /* GET /players/{id}/games: retorna el llistat de jugades per un jugador.*/
    Route::get('/players/{id}/games', [GamblingController::class,'mygames'])->name('mygames');

   /* GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.*/
   Route::get('/players/ranking', [GamblingController::class,'ranking'])->name('ranking');

    /*GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit*/  
    Route::get('/players/loser', [GamblingController::class,'loser'])->name('loser');

    /*GET /players/ranking/winner: retorna el jugador amb pitjor percentatge d’èxit.*/
    Route::get('/players/winner', [GamblingController::class,'winner'])->name('winner');


    
    
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
