<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

Route::middleware('only_sign_in')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProcess']);
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('transaksi', [TransaksiController::class, 'index'])->middleware('auth')->name('transaksi');

Route::get('jasa', [JasaController::class, 'index'])->middleware('auth')->name('jasa');
Route::post('/layanan-add', [JasaController::class, 'createLayanan'])->middleware('auth')->name('layanan.create');
Route::post('/penjemputan-add', [JasaController::class, 'createPenjemputan'])->middleware('auth')->name('penjemputan.create');
Route::post('/pengiriman-add', [JasaController::class, 'createPengiriman'])->middleware('auth')->name('pengiriman.create');
Route::delete('/jasa-delete-pelayanan/{id}', [JasaController::class, 'destroyLayanan'])->name('jasa.destroy.layanan');
Route::delete('/jasa-delete-penjemputan/{id}', [JasaController::class, 'destroyPenjemputan'])->name('jasa.destroy.penjemputan');
Route::delete('/jasa-delete-pengiriman/{id}', [JasaController::class, 'destroyPengiriman'])->name('jasa.destroy.pengiriman');
Route::put('/jasa-edit-layanan/{id}', [JasaController::class, 'editLayanan'])->name('jasa.edit.layanan');
Route::put('/jasa-edit-penjemputan/{id}', [JasaController::class, 'editPenjemputan'])->name('jasa.edit.penjemputan');
Route::put('/jasa-edit-pengiriman/{id}', [JasaController::class, 'editPengiriman'])->name('jasa.edit.pengiriman');



Route::get('pengguna', [PenggunaController::class, 'index'])->middleware('auth')->name('pengguna');
Route::post('/pengguna-add', [PenggunaController::class, 'create'])->middleware('auth')->name('pengguna');
Route::delete('/pengguna-delete/{id}', [PenggunaController::class, 'destroy']);
Route::put('/pengguna-edit/{id}', [PenggunaController::class, 'edit']);

Route::get('laporan', [LaporanController::class, 'index'])->middleware('auth')->name('laporan');

Route::get('profile', [Profilecontroller::class, 'index'])->middleware('auth')->name('profile');
Route::put('/profile-edit/{id}', [ProfileController::class, 'edit']);
// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function(){
//     Route::post('auth/login', [AuthController::class,'login'])->name('login');
// });
