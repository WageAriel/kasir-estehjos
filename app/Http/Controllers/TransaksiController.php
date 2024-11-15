<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Inertia\Inertia;

class TransaksiController extends Controller
{
    public function Transaksi()
    {
        // Ambil semua data transaksi dari database
        $transaksi = Transaksi::all();
        return response()->json([
            'transaksi' => $transaksi
        ], 200);
    }

    public function index()
    {
        $transaksi = Transaksi::all();
        return Inertia::render('TransaksiView', ['transaksi' => $transaksi]);
    }
}
