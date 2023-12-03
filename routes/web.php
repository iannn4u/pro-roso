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

Route::middleware('guest')->prefix('auth')->group(function () {
    Route::view('signin', 'auth.signin')->name('login');
    Route::view('signup', 'auth.signup')->name('register');
    Route::post('signin', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('signout', [AuthController::class, 'signout']);

    Route::get('/', [UserController::class, 'index'])->name('dashboard');
    Route::get('username', [UserController::class, 'ajax']);
    Route::post('/file/send/{id_file}', [PesanController::class, 'store']);

    Route::resource('user', UserController::class);
    Route::resource('file', FileController::class)->only(['edit', 'destroy', 'store', 'update']);

    Route::controller(FileController::class)->group(function () {
        Route::get('publikFile', 'index');
        Route::get('/file/new', 'create')->name('new');
        Route::get('download/{id_file}', 'download')->name('file.download');
        Route::get('d/{id_file}/{filename}', 'downloadByLink');
        Route::get('{username}/file/{id_file}', 'fileDetail')->name('file.detail');
        Route::get('{username}/share/{id_file}', 'fileShareDetail')->name('file.share.detail');
    });

    Route::controller(AdminController::class)->prefix('a/users')->middleware('admin')->group(function () {
        Route::get('/', 'index');
        Route::get('verified/{id_user}', 'verified')->name('verify');
        Route::delete('hapus/{id_user}', 'destroy')->name('hapusUser');
        Route::get('/{id_user}/edit', 'edit')->name('editUser');
        Route::put('/{id_user}/edit', 'update')->name('editAction');
    });
});