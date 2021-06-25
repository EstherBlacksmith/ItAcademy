<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CollarController;
use App\Http\Controllers\HomeController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('register',[PassportController::class, 'create'])->name('register.show');
Route::post('register', [PassportController::class, 'register'])->name('register');


Route::get('login',[PassportController::class, 'show'])->name('login.show');
Route::post('login', [PassportController::class, 'login'])->name('login');
  


Route::get('shops/{shop}/edit',[ShopController::class,'edit'])->name('shops.edit');

Route::get('shops',[ShopController::class,'index'])->name('index.shops');  

Route::get('home', [HomeController::class, 'index'])->name('home'); 

Route::get('shops/create',[ShopController::class,'create'])->name('create.shops');

Route::get('collars',[CollarController::class,'index'])->name('index.collars');
Route::get('collars/{shop}/edit',[CollarController::class,'edit'])->name('collars.edit');

Route::get('collars/create',[CollarController::class,'create'])->name('create.collars');



Route::group(['middleware' => ['auth:api']], function () {    

    Route::post('logout', [PassportController::class, 'logout'])->name('logout'); 

    Route::post('shops',[ShopController::class,'store'])->name('store.shops');

    Route::delete('shops/{shop}',[ShopController::class,'destroy'])->name('shops.destroy');
    Route::put('shops/{shop}',[ShopController::class,'update'])->name('shops.update');

    Route::post('collars',[CollarController::class,'store'])->name('store.collars');
    Route::put('collars/{collar}',[CollarController::class,'update'])->name('collars.update');
    Route::delete('collars/{collar}',[CollarController::class,'destroy'])->name('collars.destroy');

});

