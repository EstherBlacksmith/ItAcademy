<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\API\ShopController;
use App\Http\Controllers\API\CollarController;


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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('shops',[ShopController::class,'index'])->name('shops');





Route::group(['middleware' => ['role:owner']], function () {
    //create, delete, update shops
    Route::get('createShops',[ShopController::class,'create'])->name('createShops');
    Route::post('createShops',[ShopController::class,'store'])->name('storeShop');

    Route::get('updateShop',[ShopController::class,'update'])->name('updateShop');
    Route::post('updateShop',[ShopController::class,'update']);

    Route::post('deleteShop/{shop}',[ShopController::class,'delete'])->name('deleteShop');

    Route::get('burnCollars/{shop}',[CollarController::class,'burnCollars'])->name('burnCollars');

});

Route::group(['middleware' => ['role:worker']], function () {
    //create, delete, update colalrs
    Route::get('collars',[CollarController::class,'index'])->name('collars');
    Route::get('createCollars',[CollarController::class,'create'])->name('createCollars');
    Route::post('createCollars',[CollarController::class,'store'])->name('storeCollar');

    Route::get('updateCollar',[CollarController::class,'update'])->name('updateCollar');
    Route::post('updateCollar',[CollarController::class,'update']);

    Route::post('deleteCollar/{shop}',[CollarController::class,'delete'])->name('deleteCollar');


});