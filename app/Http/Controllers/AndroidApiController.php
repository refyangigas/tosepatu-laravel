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

    public function PembayaranApi(Request $request)
    {
        $id_user = $request->input('id_user');

        $transaksi = Transaksi::join('users', 'transaksi.id_user', '=', 'users.id')
            ->join('layanan', 'transaksi.id_layanan', '=', 'layanan.id')
            ->select('transaksi.*', 'users.name as nama_user', 'users.email as email_user', 'layanan.name as nama_layanan')
            ->where('users.id', $id_user)
            ->where('transaksi.status', 'Belum Selesai')
            ->get();

        return response()->json($transaksi);
    }
    public function apiBukti(Request $request)
    {
        // Validasi request
        $request->validate([
            'id' => 'required|numeric',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $id = $request->input('id');

        // Mengambil file bukti dari request
        $bukti = $request->file('bukti');

        // Cek apakah transaksi dengan ID yang diberikan ada dalam database
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            // Jika transaksi tidak ditemukan, kembalikan respons error
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        // Periksa apakah transaksi memiliki bukti sebelumnya
        if ($transaksi->bukti) {
            // Hapus file bukti sebelumnya dari direktori public
            $publicPath = public_path('uploads');
            $oldBuktiPath = $publicPath . '/' . $transaksi->bukti;
            if (file_exists($oldBuktiPath)) {
                unlink($oldBuktiPath);
            }
        }

        // Simpan file bukti baru ke dalam direktori public
        $publicPath = public_path('uploads');
        $newBuktiPath = $publicPath . '/' . $bukti->getClientOriginalName();
        $bukti->move($publicPath, $bukti->getClientOriginalName());

        // Simpan informasi bukti baru ke dalam database
        $transaksi->bukti = $bukti->getClientOriginalName();
        $transaksi->save();

        // Mengembalikan response sukses
        return response()->json(['message' => 'Bukti berhasil diunggah'], 200);
    }

    public function createTransaksi(Request $request)
    {
        try {
            $request->validate([
                'id_pembayaran' => 'required',
                'id_layanan' => 'required',
                'id_penjemputan' => 'required',
                'id_pengiriman' => 'required',
                'id_user' => 'required',
                'alamat' => 'required',
                'total' => 'required',
                'jumlah' => 'required',
            ]);

            $transaksi = new Transaksi();
            $transaksi->id_pembayaran = $request->input('id_pembayaran');
            $transaksi->id_layanan = $request->input('id_layanan');
            $transaksi->id_penjemputan = $request->input('id_penjemputan');
            $transaksi->id_pengiriman = $request->input('id_pengiriman');
            $transaksi->id_user = $request->input('id_user');
            $transaksi->alamat = $request->input('alamat');
            $transaksi->status = 'Belum Selesai';
            $transaksi->total = $request->input('total');
            $transaksi->jumlah = $request->input('jumlah');
            $transaksi->tanggal = now();

            $transaksi->save();

            return response()->json($transaksi, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}