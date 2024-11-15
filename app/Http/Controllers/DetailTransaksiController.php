<?php

namespace App\Http\Controllers;


use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class DetailTransaksiController extends Controller
{
    public function getAllDetail()
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
