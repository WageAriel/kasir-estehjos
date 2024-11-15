<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function DetailTransaksi()
    {
        // Ambil semua data transaksi dari database
        $detail = DetailTransaksi::all();
        return response()->json([
            'detail' => $detail
        ], 200);
    }

    public function index()
    {
        $detail = DetailTransaksi::all();
        return Inertia::render('DetailTransaksiView', ['detail' => $detail]);
    }}
