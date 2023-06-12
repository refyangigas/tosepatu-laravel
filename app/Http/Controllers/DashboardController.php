<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pendapatan = Transaksi::selectRaw('MONTH(tanggal) as bulan, SUM(total) as pendapatan')
            ->where('status', 'Selesai')
            ->whereYear('tanggal', Carbon::now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();
        
        $labels = $pendapatan->pluck('bulan');
        $data = $pendapatan->pluck('pendapatan');

        $totalpendapatan = Transaksi::where('status', 'Selesai')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->sum('total');

        $datatransaksi = Transaksi::whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->count();

        $user = User::count();
        $datalayanan = Layanan::count();

        return view('admin.pages.dashboard', [
            'totalpendapatan' => $totalpendapatan,
            'totaltransaksi' => $datatransaksi,
            'totaldatauser' => $user,
            'totaldatalayanan' => $datalayanan,
            'datapendapatan' => $data,
            'labelpendapatan' => $labels,
            'transaksis' => Transaksi::all(), // Menambahkan data transaksi untuk grafik pendapatan bulanan
        ]);
    }
}
