<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Transaksi;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $perPage = 10;
    $currentPage = request()->get('page', 1);
    $tanggal = $request->input('tanggal');
    $status = $request->input('status');

    $query = Transaksi::with('User', 'Penjemputan', 'Pengiriman', 'Layanan', 'Pembayaran');

    if ($tanggal) {
        $query->whereDate('tanggal', $tanggal);
    }

    if ($status) {
        $query->where('status', $status);
    }

    $datatransaksi = $query->get();

    $collection = collect($datatransaksi);
    $total = $collection->count();
    $start = ($currentPage - 1) * $perPage;
    $sliced = $collection->slice($start, $perPage);
    $paginatedItems = $sliced->values();
    $paginated = new LengthAwarePaginator($paginatedItems, $total, $perPage, $currentPage);

    return view('admin.pages.laporan', [
        'datatransaksi' => $datatransaksi,
        'paginated' => $paginated,
        'currentPage' => $currentPage,
        'perPage' => $perPage,
    ]);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanController  $laporanController
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanController $laporanController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanController  $laporanController
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanController $laporanController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanController  $laporanController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanController $laporanController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanController  $laporanController
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanController $laporanController)
    {
        //
    }
}
