<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('signin', [AuthController::class, 'viewSignin']);
    Route::post('signin', [AuthController::class, 'signin']);
    Route::get('signup', [AuthController::class, 'viewSignup']);
    Route::post('signup', [AuthController::class, 'signup']);
});

Route::middleware('auth')->group(function () {
    Route::get('signout', [AuthController::class, 'signout']);
    Route::get('/', [UserController::class, 'index']);

    Route::resource('user', UserController::class);
});
