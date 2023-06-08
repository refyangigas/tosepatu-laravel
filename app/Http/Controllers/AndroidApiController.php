<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AndroidApiController extends Controller
{
    public function StatusApi(Request $request)
    {
        $id_user = $request->input('id_user');

        $transaksi = Transaksi::join('users', 'transaksi.id_user', '=', 'users.id')
            ->join('layanan', 'transaksi.id_layanan', '=', 'layanan.id')
            ->select('transaksi.*', 'users.name as nama_user', 'users.email as email_user', 'layanan.name as nama_layanan')
            ->where('users.id', $id_user)
            ->get();

        return response()->json($transaksi);
    }

    public function ProfileApi(Request $request)
    {
        $id_user = $request->input('id_user');

        $user = User::find($id_user);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }
    public function UpdateProfile(Request $request)
    {
        $user = User::findOrFail($request->input('id_user'));

        // Validasi request jika hanya field yang diisi yang akan diupdate
        $validatedData = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:6',
        ]);

        // Update data pengguna jika ada perubahan pada field yang diisi
        if ($request->has('name')) {
            $user->name = $validatedData['name'];
        }
        if ($request->has('email')) {
            $user->email = $validatedData['email'];
        }
        if ($request->has('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return response()->json($user);
    }
    public function LayananApi(Request $request)
    {
        $layanan = Layanan::all();
        return response()->json($layanan);
    }
}