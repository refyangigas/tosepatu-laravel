<?php

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

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function(){
//     Route::get('login', [AuthController::class,'login'])->name('login');
//     Route::post('login', [AuthController::class,'login'])->name('login');
// });

// Route::group([
//     'middleware'=>'api'
// ],

// function(){
//     Route::resources([
//        'categories'=>CategoryController::class,
//        'subcategories'=>subcategoryController::class
Route::get('layanan',[ApiLayananController::class,"all"]);
Route::get('pembayaran',[ApiPembayaranController::class,"all"]);
Route::get('pengiriman',[ApiPengirimanController::class,"all"]);
Route::get('penjemputan',[ApiPenjemputanController::class,"all"]);

Route::middleware('auth:sanctum')->group(function () {
   Route::post('transaksi',[ApiTransaksiController::class,'insert']);
});
