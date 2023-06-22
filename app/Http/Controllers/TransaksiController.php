<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;



class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10;
        $currentPage = $request->get('page', 1);

        // Filter Sort By
        $sortby = $request->input('sortby');

        // Query data transaksi dengan relasi
        $query = Transaksi::with('User', 'Penjemputan', 'Pengiriman', 'Layanan', 'Pembayaran');

        // Filter Status
        $status = $request->input('status');
        if ($status) {
            $query->where('status', $status);
        }

        // Filter pencarian berdasarkan nama, alamat, status, pembayaran, jumlah, dan tanggal
        $searchQuery = $request->input('search');
        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('alamat', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('status', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('jumlah', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhereHas('User', function ($userQuery) use ($searchQuery) {
                        $userQuery->where('name', 'LIKE', '%' . $searchQuery . '%');
                    })
                    ->orWhereHas('Pembayaran', function ($pembayaranQuery) use ($searchQuery) {
                        $pembayaranQuery->where('nama', 'LIKE', '%' . $searchQuery . '%');
                    })
                    ->orWhereDate('created_at', 'LIKE', '%' . $searchQuery . '%');
            });
        }

        // Filter tanggal awal dan akhir
$startDate = $request->input('start_date');
$endDate = $request->input('end_date');
if ($startDate && $endDate) {
    $startDate = Carbon::createFromFormat('Y/m/d', $startDate)->startOfDay()->format('Y-m-d');
    $endDate = Carbon::createFromFormat('Y/m/d', $endDate)->endOfDay()->format('Y-m-d');
    $query->whereBetween('created_at', [$startDate, $endDate]);
}


        // Urutan data berdasarkan Sort By
        if ($sortby === 'asc') {
            $query->leftJoin('users', 'transaksi.id_user', '=', 'users.id')
                ->orderBy('users.name', 'asc');
        } elseif ($sortby === 'desc') {
            $query->leftJoin('users', 'transaksi.id_user', '=', 'users.id')
                ->orderBy('users.name', 'desc');
        }

        $datatransaksi = $query->get();
        $collection = collect($datatransaksi);
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
            'searchQuery' => $searchQuery,
            'startDate' => $startDate,
            'endDate' => $endDate
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
