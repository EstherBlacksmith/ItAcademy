<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredUserController;

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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';*/


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

/** CRUD **/
/* create */

Route::get('/create', [TareasController::class,'mostrarEmpleado'])->name('createEmpleado');

Route::post('/create', [EmpleadosController::class,'storeEmpleado'])->name('storeEmpleado');


/* create tareas*/
Route::get('/createTarea', [TareasController::class,'mostrarTarea'])->name('createTarea');

Route::post('/createTarea', [TareasController::class,'store'])->name('storeTarea');


/* delete */
Route::get('/delete', function () {
    return view('empleados.delete');
})->name('delete');

Route::delete('/delete', [EmpleadosController::class,'deleteEmpleado'])->name('deleteEmpleado');


/* update */
Route::get('/update/{id}', [EmpleadosController::class,'mostrarEmpleado'])->name('updateView');

Route::put('/update', [EmpleadosController::class,'updateEmpleado'])->name('updateEmpleado');


/* read */
Route::get('/show', [EmpleadosController::class,'filtraEmpleado'])->name('show');

/* login */

Route::get('/register',   function () {
    return view('auth.register');
})-> name('register');


/*
Route::post('/register', [RegisteredUserController::class,'store'])-> name('storeUser');*/


Route::get('/login',  [LoginController::class,'login'])-> name('login');
/*
Route::post('/login',[LoginController::class,'login']);*/

?>