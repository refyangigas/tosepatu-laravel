<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\PenggunaController;
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
Route::get('pengguna', [PenggunaController::class, 'index'])->middleware('auth')->name('pengguna');
// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function(){
//     Route::post('auth/login', [AuthController::class,'login'])->name('login');
// });