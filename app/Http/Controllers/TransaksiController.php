<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $datatransaksi = Transaksi::with('User', 'Penjemputan', 'Pengiriman', 'Layanan', 'Pembayaran')->get();

        $totalPengiriman = 0;
        $totalPenjemputan = 0;
        $totalLayanan = 0;

        foreach ($datatransaksi as $transaksi) {
            $totalPengiriman += $transaksi->Pengiriman->harga * $transaksi->jumlah;
            $totalPenjemputan += $transaksi->Penjemputan->harga * $transaksi->jumlah;
            $totalLayanan += $transaksi->Layanan->harga * $transaksi->jumlah;
        }

        $total = $totalPengiriman + $totalPenjemputan + $totalLayanan;

        return view('admin.pages.transaksi', [
            'datatransaksi' => $datatransaksi,
            'totalPengiriman' => $totalPengiriman,
            'totalPenjemputan' => $totalPenjemputan,
            'totalLayanan' => $totalLayanan,
            'total' => $total,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'alamat' => 'required',
            'jumlah' => 'required',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->alamat = $request->alamat;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->save();

        return redirect()->back()->with('update', 'Data transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Transaksi::find($id)->delete();

        return redirect('/transaksi')->with('delete', 'Berhasil delete');
    }
}
