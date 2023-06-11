<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $datatransaksi = Transaksi::with('User', 'Penjemputan', 'Pengiriman', 'Layanan', 'Pembayaran')->get();

        return view('admin.pages.transaksi', [
            'datatransaksi' => $datatransaksi,       
        ]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required',
        'alamat' => 'required',
        'jumlah' => 'required',
        'bukti_transaksi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $transaksi = Transaksi::findOrFail($id);
    $transaksi->status = $request->status; 
    $transaksi->alamat = $request->alamat;
    $transaksi->jumlah = $request->jumlah;

    $transaksi->load('Pengiriman', 'Penjemputan', 'Layanan'); // Memuat relasi yang diperlukan

    // Simpan bukti transaksi
    if ($request->hasFile('bukti')) { 
        $file = $request->file('bukti'); 
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $transaksi->bukti = $filename;
    }

    // Perhitungan total
    $totalPengiriman = $transaksi->Pengiriman->harga * $transaksi->jumlah;
    $totalPenjemputan = $transaksi->Penjemputan->harga * $transaksi->jumlah;
    $totalLayanan = $transaksi->Layanan->harga * $transaksi->jumlah;
    $total = $totalPengiriman + $totalPenjemputan + $totalLayanan;

    $transaksi->total = $total;
    $transaksi->save();

    return redirect()->back()->with('update', 'Data transaksi berhasil diperbarui.');
}


    public function destroy($id)
    {
        Transaksi::find($id)->delete();

        return redirect('/transaksi')->with('delete', 'Berhasil delete');
    }
}
