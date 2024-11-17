<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class DetailTransaksiController extends Controller
{
    // Method untuk mengambil semua detail transaksi dalam format JSON
    public function getAllDetail()
    {
        // Ambil semua data transaksi dengan data produk terkait menggunakan eager loading
        $detail = DetailTransaksi::with('produk')->get();

        // Modifikasi data untuk menambahkan produk_name ke setiap item
        $detailWithProdukName = $detail->map(function ($item) {
            // Pastikan produk terkait ada sebelum mengakses produk_name
            $item->produk_name = $item->produk ? $item->produk->produk_name : null;
            return $item;
        });

        // Kembalikan data dalam format JSON dengan status 200
        return response()->json([
            'detail' => $detailWithProdukName
        ], 200);
    }

    // Method untuk mengambil semua detail transaksi dan render tampilan dengan Inertia
    public function index()
    {
        // Ambil semua data transaksi dengan data produk terkait menggunakan eager loading
        $detail = DetailTransaksi::with('produk')->get();

        // Modifikasi data untuk menambahkan produk_name ke setiap item
        $detailWithProdukName = $detail->map(function ($item) {
            // Pastikan produk terkait ada sebelum mengakses produk_name
            $item->produk_name = $item->produk ? $item->produk->produk_name : null;
            return $item;
        });

        // Kirim data detail transaksi ke tampilan Vue menggunakan Inertia
        return Inertia::render('DetailTransaksiView', [
            'detail' => $detailWithProdukName
        ]);
    }
}
