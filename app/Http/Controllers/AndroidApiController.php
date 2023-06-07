<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

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


}