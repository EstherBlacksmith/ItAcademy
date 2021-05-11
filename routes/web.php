<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionesController;

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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/reservas', function () {
    return view('reservas');
})->name('reservas');

Route::get('/aboutUs', function () {
    return view('aboutUS');
})->name('aboutUS');

Route::get('/habitaciones',[HabitacionesController::class,'habitacionesCreateView'])->name('habitaciones');

Route::post('/habitaciones',[HabitacionesController::class,'habitacionesCreateStore'])->name('habitacionesCreateStore');

Route::get('habitacionesDelete/{id}',[HabitacionesController::class,'habitacionesDelete'])->name('habitacionesDelete');

Route::put('habitacionesUpdate/{id}',[HabitacionesController::class,'habitacionesUpdate'])->name('habitacionesUpdate');



