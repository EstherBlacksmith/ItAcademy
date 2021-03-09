<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('paises',[App\Http\Controllers\PaisController::class, 'store']);
Route::delete('paises/{pais}',[App\Http\Controllers\PaisController::class, 'destroy']);
Route::put('paises/{pais}',[App\Http\Controllers\PaisController::class, 'update']);


Route::post('paises/{pais}/departamentos',[App\Http\Controllers\DepartamentoController::class, 'store']);
Route::delete('paises/{pais}/departamentos/{departamento}',[App\Http\Controllers\DepartamentoController::class, 'destroy']);
Route::put('paises/{pais}/departamentos/{departamento}',[App\Http\Controllers\DepartamentoController::class, 'update']);