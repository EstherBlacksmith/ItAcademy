<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\TeamsController;
use  App\Http\Controllers\MatchesController;
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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* EQUIPOS */

Route::get('/equiposIndex',[TeamsController::class,'index'])->name('equiposIndex');

Route::get('/equiposCreate',[TeamsController::class,'equiposCreate'])->name('equiposCreate');

Route::post('/equiposCreate',[TeamsController::class,'equiposCreateStore'])->name('equiposCreateStore');

Route::get('/equiposUpdate/{id}',[TeamsController::class,'update'])->name('equiposUpdate');

Route::post('/equiposUpdate',[TeamsController::class,'equiposUpdateStore'])->name('equiposUpdateStore');

Route::get('/equiposDelete/{id}', [TeamsController::class,'equiposDelete'])->name('equiposDelete');


/* PARTIDOS */

Route::get('/partidosIndex',[MatchesController::class,'index'])->name('partidosIndex');

Route::get('/partidosCreate', function () {
    return view('partidos.partidosCreate');
});

Route::get('/partidosUpdate/{id}', [MatchesController::class,'partidosUpdate'])->name('partidosUpdate');

Route::post('/partidosUpdate/{id}',[MatchesController::class,'partidosUpdateStore'])->name('partidosUpdateStore');

Route::get('/partidosDelete', function () {
    return view('partidos.partidosDelete');
});

Route::post('/partidosDelete/{id}', function () {
    return view('partidos.partidosDelete');
})->name('partidosDelete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
