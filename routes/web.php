<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Admin
Route::group(['middleware' => 'admin'], function () {
    // Route Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::get('/guru/detail/{id_guru}', [GuruController::class, 'detail']);
    Route::get('/guru/add', [GuruController::class, 'add']);
    Route::post('/guru/insert', [GuruController::class, 'insert']);
    Route::get('/guru/edit/{id_guru}', [GuruController::class, 'edit']);
    Route::post('/guru/update/{id_guru}', [GuruController::class, 'update']);
    Route::delete('/guru/delete/{id_guru}', [GuruController::class, 'delete']);

    // Route Siswa
    Route::get('/siswa', [SiswaController::class, 'index']);
});

// Route User
Route::group(['middleware' => 'user'], function () {
    Route::get('/user', [UserController::class, 'index']);
});

// Route Koperasi
Route::group(['middleware' => 'koperasi'], function () {
    Route::get('/koperasi', [KoperasiController::class, 'index'])->name('koperasi');
    Route::get('/koperasi/detail/{id_koperasi}', [KoperasiController::class, 'detail']);
    Route::get('/koperasi/add', [KoperasiController::class, 'add']);
    Route::post('/koperasi/insert', [KoperasiController::class, 'insert']);
    Route::get('/koperasi/edit/{id_koperasi}', [KoperasiController::class, 'edit']);
    Route::post('/koperasi/update/{id_koperasi}', [KoperasiController::class, 'update']);
    Route::delete('/koperasi/delete/{id_koperasi}', [KoperasiController::class, 'delete']);
    // print
    Route::get('/koperasi/print', [KoperasiController::class, 'print']);
    Route::get('/koperasi/printpdf', [KoperasiController::class, 'printpdf']);
});
