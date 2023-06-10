<?php

use App\Http\Controllers\AndroiAuthController;
use App\Http\Controllers\AndroidApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AndroiAuthController::class, 'login']);
Route::post('/register', [AndroiAuthController::class, 'register']);
Route::post('/apistatus', [AndroidApiController::class, 'StatusApi']);
Route::post('/apiprofile', [AndroidApiController::class, 'ProfileApi']);
Route::post('/updateprofile', [AndroidApiController::class, 'UpdateProfile']);
Route::get('/apilayanan', [AndroidApiController::class, 'LayananApi']);
Route::get('/apipenjemputan', [AndroidApiController::class, 'PenjemputanApi']);
Route::get('/apipengiriman', [AndroidApiController::class, 'PengirimanApi']);
Route::post('/apipembayaran', [AndroidApiController::class, 'PembayaranApi']);
Route::post('/apibukti', [AndroidApiController::class, 'apiBukti']);
Route::post('/transaksi', [AndroidApiController::class, 'createTransaksi']);