<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\GamblingController;
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


Route::get('loginForm',function(){
    return view('auth.login');
})->name('loginForm');

Route::post('/players', [AuthController::class, 'login'])->name('players');

Route::get('play',[GamblingController::class,'play'])->name('play');
Route::get('setResult',[GamblingController::class,'setResult'])->name('setResult');

Route::get('mygames',[GamblingController::class,'mygames'])->name('mygames'); 

Route::middleware('jwt.auth')->group(function(){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

/*
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});
*/
/*
POST: /players : crea un jugador
PUT /players/{id} : modifica el nom del jugador
POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus.
DELETE /players/{id}/games: elimina les tirades del jugador
GET /players/: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits 
GET /players/{id}/games: retorna el llistat de jugades per un jugador.
GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.
GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit
GET /players/ranking/winner: retorna el jugador amb pitjor percentatge d’èxit.
*/