<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class TransaksiController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $datatransaksi = Transaksi::with('User', 'Penjemputan', 'Pengiriman', 'Layanan', 'Pembayaran')->get();
        $collection = new Collection($datatransaksi);
        $total = $collection->count();
        $start = ($currentPage - 1) * $perPage;
        $sliced = $collection->slice($start, $perPage);
        $paginatedItems = $sliced->values();
        $paginated = new LengthAwarePaginator($paginatedItems, $total, $perPage, $currentPage);
    
    
        return view('admin.pages.transaksi', [
            'datatransaksi' => $datatransaksi,   
            'paginated' => $paginated,
            'currentPage' => $currentPage,
            'perPage' => $perPage,    
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
