<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $datapendapatan = Transaksi::where('status','selesai')->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->sum('total');
        $datatransaksi = Transaksi::whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->count();
        $user = User::count();
        $datalayanan = Layanan::count();

        return view('admin.pages.dashboard', [
            'totalpendapatan' => $datapendapatan,
            'totaltransaksi' => $datatransaksi,
            'totaldatauser' => $user,
            'totaldatalayanan' => $datalayanan
        ]);
    }
}
