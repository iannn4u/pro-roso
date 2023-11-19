<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PesanController;
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
    Route::get('signin', [AuthController::class, 'viewSignin'])->name('signin');
    Route::post('signin', [AuthController::class, 'signin']);
    Route::get('signup', [AuthController::class, 'viewSignup']);
    Route::post('signup', [AuthController::class, 'signup']);
});

Route::middleware('auth')->group(function () {
    Route::get('signout', [AuthController::class, 'signout']);

    Route::get('/', [UserController::class, 'index']);
    Route::resource('user', UserController::class);
    Route::get('username', [UserController::class, 'ajax']);
    Route::post('kirimFile/{id_file}', [PesanController::class, 'store']);

    Route::resource('file', FileController::class);
    Route::controller(FileController::class)->group(function () {
        Route::get('publikFile', 'index');
        Route::get('download/{id_file}', 'download');
        Route::get('d/{id_file}/{filename}', 'linkDownload')->middleware('auth');
        Route::get('/detail/{id_file}', 'detailPublik');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('admin', 'index');
        Route::get('verified/{id_user}', 'verified');
        Route::get('hapus/{id_user}', 'destroy');
        Route::get('admin/{id_user}/edit', 'edit');
        Route::put('admin/{id_user}/edit', 'update');
    })->middleware('admin');
});
