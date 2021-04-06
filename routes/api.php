<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use \App\Http\Middleware;
use App\Http\Controllers\UsuarioDatosCOntroller;
use App\Http\Controllers\BookController;
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
/*


Route::post('/login', function () {
    return "Logout usuari!";
});


Route::post('/catalog/create', function () {
    return "Afegir llibre!";
});

Route::put('/catalog/edit/{id}', function () {
    return " Modificar llibre!";
});
 
 Route::put('/catalog/edit/{id?}', function () {
    return view('catalog.update');
 });
  
  Route::post('/catalog/create', function () {
    return view('catalog.create');
});
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//
//Route::post('auth/login', [UsuarioDatosCOntroller::class, 'usuarioDatos'])->name('loginAuth');
//
//Route::post('auth/register', [UsuarioDatosCOntroller::class, 'usuarioDatosRegister'])->name('loginRegister');
//
//Route::post('auth/resetPassword', [UsuarioDatosCOntroller::class, 'usuarioDatosReset'])->name('loginReset');
//
//Route::post('catalog/update', function(){
//    return view('catalog/updateAuth');
//})-> name('updateAuth');
//
//Route::post('catalog/delete', function(){
//    return view('catalog/deleteAuth');
//})-> name('deleteAuth');
// 

