<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\smsController;
use App\Http\Controllers\newUserController;
use App\Http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('user')->group(function () {

    Route::post('signup' , newUserController::class);


    Route::post('login' , loginController::class);
});



Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('send', [smsController::class , 'index']);
});

