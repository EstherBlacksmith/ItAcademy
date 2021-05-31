<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\Auth\RegisterUserController;


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
Route::get('/datepicker', function () {
    return view('datepicker');
});

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


Route::get('/aboutUs', function () {
    return view('aboutUS');
})->name('aboutUS');

Route::group( ['middleware' => 'auth' ], function(){

    Route::get('/reservas', [ReservasController::class,'reservaView'])->name('reservas');
    Route::post('/reservas',[ReservasController::class,'reservaStore'])->name('reservaStore');
    Route::post('/reservaDelete',[ReservasController::class,'reservaDelete'])->name('reservaDelete');


});

//Controlamos qué rutas están accesible de pendiendo de los roles y si se está loggeado
    Route::group(['middleware' => 'admin'], function () {

    Route::get('/estructura',[HabitacionesController::class,'estructuraHotel'])->name('estructuraHotel');

    Route::post('/plantasCreate',[HabitacionesController::class,'plantasCreate'])->name('plantasCreate');

    Route::post('/puertasCreate',[HabitacionesController::class,'puertasCreate'])->name('puertasCreate');

    Route::get('/habitaciones',[HabitacionesController::class,'habitacionesCreateView'])->name('habitaciones');

    Route::post('/habitaciones',[HabitacionesController::class,'habitacionesCreateStore'])->name('habitacionesCreateStore');

    Route::post('habitacionesDelete/{id}',[HabitacionesController::class,'habitacionesDelete'])->name('habitacionesDelete');

    Route::put('habitacionesUpdate/{id}',[HabitacionesController::class,'habitacionesUpdate'])->name('habitacionesUpdate');

});





