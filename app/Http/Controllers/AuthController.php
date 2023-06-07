<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        // validasi
        $credentials = $request->validate([
            'name'=> 'required|string',
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            // dd(Auth::user());
            if (Auth::user()->email_verified_at == null) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'verifikasi');
                return redirect('login');
            }

            if (Auth::user()->id_role == 1) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Akun tidak ditemukan');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    // protected function respondWithToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => auth()->guard()->factory()->getTTL() * 60
    //     ]);
    // }
}
