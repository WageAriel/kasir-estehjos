<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        $totalJumlah = Transaksi::sum('total_jumlah');
        return Inertia::render('HomeView', [
            'transaksi' => $transaksi,
            'totalJumlah' => $totalJumlah,
        ]);



    }

    public function apiData()
{
    //harian
    $totalHarian = Transaksi::whereDate('tanggal_transaksi', today())->sum('total_jumlah');
    $latestTransaction = Transaksi::orderBy('created_at', 'desc')->first();
    $latestAmount = $latestTransaction ? $latestTransaction->total_jumlah : 0;

    //mingguan
    $startOfWeek = Carbon::now()->startOfWeek(); // Senin
    $endOfWeek = Carbon::now()->endOfWeek();     // Minggu
    $totalMingguan = Transaksi::whereBetween('tanggal_transaksi', [$startOfWeek, $endOfWeek])
        ->sum('total_jumlah');
    $transaksiMingguanTerakhir = Transaksi::whereBetween('tanggal_transaksi', [$startOfWeek, $endOfWeek])
        ->orderBy('created_at', 'desc')
        ->first();
    $pendapatanMingguanTerakhir = $transaksiMingguanTerakhir ? $transaksiMingguanTerakhir->total_jumlah : 0;

    //bulanan
    $totalBulanan = Transaksi::whereMonth('tanggal_transaksi', now()->month)
        ->whereYear('tanggal_transaksi', now()->year)
        ->sum('total_jumlah');

    // Transaksi terakhir di bulan ini
    $transaksiBulananTerakhir = Transaksi::whereMonth('tanggal_transaksi', now()->month)
        ->whereYear('tanggal_transaksi', now()->year)
        ->latest('created_at')
        ->first();
    $pendapatanBulananTerakhir = $transaksiBulananTerakhir ? $transaksiBulananTerakhir->total_jumlah : 0;


    return response()->json([
        'totalHarian' => $totalHarian,
        'latestAmount' => $latestAmount,
        'totalMingguan' => $totalMingguan,
        'pendapatanMingguanTerakhir' => $pendapatanMingguanTerakhir,
        'totalBulanan' => $totalBulanan,
        'pendapatanBulananTerakhir' => $pendapatanBulananTerakhir,
    ]);
}

public function monthlyChartData()
{
    $monthlyData = Transaksi::selectRaw('MONTH(tanggal_transaksi) as month, SUM(total_jumlah) as total')
        ->whereYear('tanggal_transaksi', now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    return response()->json([
        'monthlyData' => $monthlyData,
    ]);
}


public function getProdukStokKurang()
{
    $produkMenipis = Produk::where('stok', '<', 10,)
        ->where('stok', '>', 0,)
        ->get();

    return response()->json([
        'success' => true,
        'produkMenipis' => $produkMenipis
    ]);
}
public function getProdukStokHabis()
{
    $produkHabis = Produk::where('stok', '=', 0,)
        ->get();

    return response()->json([
        'success' => true,
        'produkHabis' => $produkHabis
    ]);
}



}
