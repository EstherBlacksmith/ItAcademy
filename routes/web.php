<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
//Exercici 1
/*
/                   Pantalla principal

login               Login usuari

logout              Logout usuari

catalog             Llista llibres 

catalog/show/{id}   Vista detall libre {id}

catalog/create      Afegir llibre

catalog/edit/{id}   Modificar llibre {id}*/
/*
Route::get('/', function () {
    return "Pantalla principal";
});

Route::post('login', function () {
    return "Login usuari";
});

Route::post('logout', function () {
    return "Logout usuari";
});

Route::get('catalog', function () {
    return "Llista llibres";
});

Route::post('catalog/show/{id}', function () {
    return "Vista detall libre {id}";
});

Route::post('catalog/create', function () {
    return "Afegir llibre";
});

Route::update('catalog/edit/{id}', function () {
    return "Modificar llibre {id}";
});

Route::delete('catalog/{id}', function () {
    return "Eliminar llibre {id}";
});*/

//Exercici 2, les rutes retornen views


Route::get('/', function () {
    return view('home');    
});

Route::get('login', [LoginController::class, 'login']);


Route::get('catalog', function () {
    return view('catalog/index');
});

