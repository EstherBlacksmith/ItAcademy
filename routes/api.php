<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;

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

Route::get('login',[PassportController::class, 'show'])->name('login.show');
Route::post('login', [PassportController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:api']], function () {    
    Route::post('logout', [PassportController::class, 'logout'])->name('logout');
});