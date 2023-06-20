<?php

namespace App\Http\Controllers;
use NumberFormatter;
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
        ]);
    }
    public function getPendapatan()
    {
        $pendapatan = Transaksi::selectRaw('WEEK(tanggal) as minggu, SUM(total) as pendapatan')
            ->where('status', 'Selesai')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->groupBy('minggu')
            ->orderBy('minggu')
            ->pluck('pendapatan')
            ->toArray();
    
        $formattedPendapatan = [];
        foreach ($pendapatan as $amount) {
            $formattedPendapatan[] = $amount;
        }
    
        $labels = Transaksi::selectRaw('WEEK(tanggal) as minggu')
            ->where('status', 'Selesai')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->groupBy('minggu')
            ->orderBy('minggu')
            ->pluck('minggu')
            ->toArray();
    
        $formattedLabels = [];
        $weekNumber = 1;
        foreach ($labels as $minggu) {
            $formattedLabels[] = "Minggu " . $weekNumber;
            $weekNumber++;
        }
    
        return response()->json([
            'labels' => $formattedLabels,
            'data' => $formattedPendapatan
        ]);
    }

    public function getJumlahTransaksi()
    {
        $jumlahTransaksi = Transaksi::selectRaw('WEEK(tanggal) as minggu, COUNT(*) as jumlah')
            ->where('status', 'Selesai')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->groupBy('minggu')
            ->orderBy('minggu')
            ->pluck('jumlah')
            ->toArray();

        $labels = Transaksi::selectRaw('WEEK(tanggal) as minggu')
            ->where('status', 'Selesai')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->groupBy('minggu')
            ->orderBy('minggu')
            ->pluck('minggu')
            ->toArray();

        $formattedLabels = [];
        $weekNumber = 1;
        foreach ($labels as $minggu) {
            $formattedLabels[] = "Minggu " . $weekNumber;
            $weekNumber++;
        }

        return response()->json([
            'labels' => $formattedLabels,
            'data' => $jumlahTransaksi,
        ]);
    }
}
    