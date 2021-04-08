<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\EmpleadosController;
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

Route::get('/home', function () {
    return view('home');
})->name('home');

/** CRUD **/
/* create */
/*Route::get('/create', function () {
    return view('empleados.create');
})->name('create');
*/
Route::get('/create', [TareasController::class,'mostrarEmpleado'])->name('createEmpleado');

Route::post('/create', [EmpleadosController::class,'storeEmpleado'])->name('storeEmpleado');

Route::get('/createEmpleadoOK',function(){
	return "Empleado creado correctamente";
})->name('createEmpleadoOK');

/* create tareas*/
Route::get('/createTarea', [TareasController::class,'mostrarTarea'])->name('createTarea');

Route::post('/createTarea', [TareasController::class,'store'])->name('storeTarea');


/* delete */
Route::get('/delete', function () {
    return view('empleados.delete');
})->name('delete');

Route::delete('/delete', function () {
    return view('empleados.delete');
});


/* update */
Route::get('/update', function () {
    return view('empleados.update');
})->name('update');

Route::put('/update', function () {
    return view('empleados.update');
});

/* read */
Route::get('/show', function () {
    return view('empleados.show');
})->name('show');