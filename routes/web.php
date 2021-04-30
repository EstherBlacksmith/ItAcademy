<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\TeamsController;
use  App\Http\Controllers\MatchesController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\PlayerController;
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

Route::get('/equiposCreate',[TeamsController::class,'equiposCreate'])->name('equiposCreate')->middleware('admin');;

Route::post('/equiposCreate',[TeamsController::class,'equiposCreateStore'])->name('equiposCreateStore')->middleware('admin');

Route::get('/equiposUpdate/{id}',[TeamsController::class,'update'])->name('equiposUpdate')->middleware('admin');;

Route::post('/equiposUpdate',[TeamsController::class,'equiposUpdateStore'])->name('equiposUpdateStore')->middleware('admin');

Route::get('/equiposDelete/{id}', [TeamsController::class,'equiposDelete'])->name('equiposDelete')->middleware('admin');;


/* PARTIDOS */

Route::get('/partidosIndex',[MatchesController::class,'index'])->name('partidosIndex');

Route::get('/partidosCreate', [MatchesController::class,'partidosCreate'])->name('partidosCreate')->middleware('admin');;

Route::post('/partidosCreate', [MatchesController::class,'partidosCreateStore'])->name('partidosCreateStore')->middleware('admin');


Route::get('/partidosUpdate/{id}', [MatchesController::class,'partidosUpdate'])->name('partidosUpdate')->middleware('admin');;

Route::post('/partidosUpdate',[MatchesController::class,'partidosUpdateStore'])->name('partidosUpdateStore')->middleware('admin');

Route::get('/partidosDelete/{id}',[MatchesController::class,'partidosDelete'])->name('partidosDelete')->middleware('admin');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/player', [PlayerController::class,'index'])->name('player')->middleware('player');
Route::get('/admin', [AdminController::class,'index'])->name('admin')->middleware('admin');
