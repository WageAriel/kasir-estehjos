<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\DetailTransaksi;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        // Eager load transaksi with produk and transaksi_detail
        $transaksi = Transaksi::with(['detailTransaksi.produk'])->get();
        $produk = Produk::all();

        return Inertia::render('TransaksiView', [
            'transaksi' => $transaksi,
            'produk' => $produk,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
            'total_jumlah' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'kembalian' => 'required|numeric',
            'products' => 'required|array',
            'products.*.produk_id' => 'required|exists:produk,produk_id',
            'products.*.jumlah' => 'required|integer',
            'products.*.subtotal' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            // Create main transaction
            $transaksi = Transaksi::create([
                'tanggal_transaksi' => $request->tanggal_transaksi,
                'total_jumlah' => $request->total_jumlah,
                'metode_pembayaran' => $request->metode_pembayaran,
                'kembalian' => $request->kembalian,
            ]);

            // Create transaction details for each product
            foreach ($request->products as $product) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->transaksi_id,
                    'produk_id' => $product['produk_id'],
                    'jumlah' => $product['jumlah'],
                    'subtotal' => $product['subtotal'],
                ]);
            }

            DB::commit();
            return Redirect::route('transaksi')->with('success', 'Transaksi berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan transaksi']);
        }
    }

    public function destroy(Transaksi $transaksi)
    {
        DB::beginTransaction();
        try {
            // Delete related transaction details first
            $transaksi->detailTransaksi()->delete();
            // Then delete the main transaction
            $transaksi->delete();

            DB::commit();
            return Redirect::route('transaksi')->with('success', 'Transaksi berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus transaksi']);
        }
    }
}
