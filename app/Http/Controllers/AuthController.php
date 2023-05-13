<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
 public function login()
 {
    $credentials = request(['email','password']);

    // dd($credentials); 

    if (!$token = auth ()-> attempt($credentials)){
        return response()->json(['email dan password salah'],401);
    }

    return  $this->respondwithToken($token);
 }
 protected function respondWithToken($token)
 {
     return response()->json([
         'access_token' => $token,
         'token_type' => 'bearer',
         'expires_in' => auth()->guard()->factory()->getTTL() * 60
     ]);
 }
 
}