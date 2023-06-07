<?php

use App\Http\Controllers\AndroiAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AndroiAuthController::class, 'login']);
Route::post('/register', [AndroiAuthController::class, 'register']);