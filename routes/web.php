<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UsuarioDatosController;

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

Route::get('/logout', function () {
    return "Logout usuari!";
});

Route::get('/catalog', function () {
    return "Llista llibres!";
});

Route::get('/catalog/show/{id}', function () {
    return "Vista detall libre!";
});

*/
/**/

Route::get('/home', function () {
    return view('home');
})->middleware('home');

Route::get('/logout', function () {
    return view('auth.logout');
});

Route::get('/catalog/index', function () {
    return view('catalog.index');
});

Route::get('/catalog', function () {
    return view('catalog.index');
});

Route::get('/catalog/show/{id?}', function () {
    return view('catalog.show');
});

Route::get('/login',[UsuarioDatosCOntroller::class,'usuario'])->name('login');
Route::post('/login',[UsuarioDatosCOntroller::class,'usuarioDatos'])->name('loginOK');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/resetPassword', function () {
    return view('auth.resetPassword');
})->name('resetPassword');


Route::get('/catalog/create', [BookController::class, 'create'])->name('create');

Route::post('/catalog/create', [BookController::class, 'store'])->name('store');

Route::get('/catalog/createOk',function () {
    return view('catalog.createOk');
})->name('createOk');

Route::get('/catalog/delete', function () {
    return view('catalog.delete');
})->name('delete');

Route::get('/catalog/update',[BookController::class, 'update'])->name('update');

Route::post('/catalog/update',[BookController::class, 'storeUpdate'])->name('updateOK');




