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
        $formattedLabels = [];
        $formattedPendapatan = [];
        $currentWeekStart = Carbon::now()->startOfWeek();
    
        for ($i = 0; $i < 4; $i++) {
            $weekStart = $currentWeekStart->copy()->subWeeks(3 - $i)->startOfWeek();
            $weekEnd = $weekStart->copy()->endOfWeek();
    
            $weekPendapatan = Transaksi::where('status', 'Selesai')
                ->whereBetween('tanggal', [$weekStart, $weekEnd])
                ->sum('total');
    
            $formattedLabels[$i] = "Minggu " . ($i + 1);
            $formattedPendapatan[$i] = $weekPendapatan;
        }
    
        return response()->json([
            'labels' => $formattedLabels,
            'data' => $formattedPendapatan
        ]);
    }
    



    public function getJumlahTransaksi()
    {
        $formattedLabels = [];
        $formattedJumlahTransaksi = [];
        $formattedJumlahSepatu = [];
        $currentWeekStart = Carbon::now()->startOfWeek();
    
        for ($i = 0; $i < 4; $i++) {
            $weekStart = $currentWeekStart->copy()->subWeeks(4 - $i)->startOfWeek();
            $weekEnd = $weekStart->copy()->endOfWeek();
    
            $jumlahTransaksi = Transaksi::where('status', 'Selesai')
                ->whereBetween('tanggal', [$weekStart, $weekEnd])
                ->count();
    
            $jumlahSepatu = Transaksi::where('status', 'Selesai')
                ->whereBetween('tanggal', [$weekStart, $weekEnd])
                ->sum('jumlah');
    
            $formattedLabels[$i] = "Minggu " . ($i + 1);
            $formattedJumlahTransaksi[$i] = $jumlahTransaksi;
            $formattedJumlahSepatu[$i] = $jumlahSepatu;
        }
    
        return response()->json([
            'labels' => $formattedLabels,
            'jumlahTransaksi' => $formattedJumlahTransaksi,
            'jumlahSepatu' => $formattedJumlahSepatu
        ]);
    }
}    