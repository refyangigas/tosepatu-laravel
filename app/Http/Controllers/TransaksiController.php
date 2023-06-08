<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatransaksi = Transaksi::with('User','Penjemputan', 'Pembayaran', 'Layanan', 'Pengiriman')->get();


        return view('admin.pages.transaksi',[
            'datatransaksi' => $datatransaksi,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
