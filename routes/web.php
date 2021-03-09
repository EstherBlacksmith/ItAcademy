<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/vista1', function () {
    return view('vista1');
});
Route::get('/vista2', function () {
    return view('vista2');
});
Route::get('/vista3', function () {
    return view('vista3');
});
*/

Route::get('vista1/{nom?}','App\Http\Controllers\Vista1Controller@saludo');
Route::get('/vista1', 'App\Http\Controllers\Vista1Controller@get');
Route::get('/vista2', 'App\Http\Controllers\Vista2Controller@get');
Route::get('/vista3', 'App\Http\Controllers\Vista3Controller@get');

//Exercici 5
Route::get('paises',[App\Http\Controllers\PaisController::class, 'index']);
Route::post('paises',[App\Http\Controllers\PaisController::class, 'store']);
Route::get('paises/{pais}',[App\Http\Controllers\PaisController::class, 'show']);
Route::put('paises/{pais}',[App\Http\Controllers\PaisController::class, 'update']);
Route::delete('paises/{pais}',[App\Http\Controllers\PaisController::class, 'destroy']);

Route::get('paises/{pais}/departamentos',[App\Http\Controllers\DepartamentoController::class, 'index']);
Route::post('paises/{pais}/departamentos',[App\Http\Controllers\DepartamentoController::class, 'store']);
Route::get('paises/{pais}/departamentos/{departamento}',[App\Http\Controllers\DepartamentoController::class, 'show']);
Route::put('paises/{pais}/departamentos/{departamento}',[App\Http\Controllers\DepartamentoController::class, 'update']);
Route::delete('paises/{pais}/departamentos/{departamento}',[App\Http\Controllers\DepartamentoController::class, 'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
