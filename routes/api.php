<?php

use App\Http\Controllers\AndroiAuthController;
use App\Http\Controllers\AndroidApi;
use App\Http\Controllers\AndroidApiController;
use App\Http\Controllers\api\ApiLayananController;
use App\Http\Controllers\api\ApiPembayaranController;
use App\Http\Controllers\api\ApiPengirimanController;
use App\Http\Controllers\api\ApiPenjemputanController;
use App\Http\Controllers\api\ApiTransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AndroiAuthController::class, 'login']);
Route::post('/register', [AndroiAuthController::class, 'register']);
Route::post('/apistatus', [AndroidApiController::class, 'StatusApi']);
Route::post('/apiprofile', [AndroidApiController::class, 'ProfileApi']);
Route::post('/updateprofile', [AndroidApiController::class, 'UpdateProfile']);
Route::get('/apilayanan', [AndroidApiController::class, 'LayananApi']);
Route::post('/apipembayaran', [AndroidApiController::class, 'PembayaranApi']);
Route::post('/apibukti', [AndroidApiController::class, 'apiBukti']);
Route::post('/transaksi', [AndroidApiController::class, 'createTransaksi']);