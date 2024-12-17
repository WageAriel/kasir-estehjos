<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\DetailTransaksi;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Get filter parameters from the request
        $filterType = $request->input('filter_type', 'all');
        $selectedDate = $request->input('selected_date');

        // Base query for transactions
        $query = Transaksi::with(['detailTransaksi.produk']);

        // Apply filtering based on the filter type
        if ($selectedDate) {
            switch ($filterType) {
                case 'daily':
                    $query->whereDate('tanggal_transaksi', $selectedDate);
                    break;
                case 'weekly':
                    $startOfWeek = Carbon::parse($selectedDate)->startOfWeek();
                    $endOfWeek = Carbon::parse($selectedDate)->endOfWeek();
                    $query->whereBetween('tanggal_transaksi', [$startOfWeek, $endOfWeek]);
                    break;
                case 'monthly':
                    $startOfMonth = Carbon::parse($selectedDate)->startOfMonth();
                    $endOfMonth = Carbon::parse($selectedDate)->endOfMonth();
                    $query->whereBetween('tanggal_transaksi', [$startOfMonth, $endOfMonth]);
                    break;
            }
        }

        // Get the filtered transactions
        $transaksi = $query->orderBy('tanggal_transaksi', 'desc')->get();
        $produk = Produk::all();

        return Inertia::render('TransaksiView', [
            'transaksi' => $transaksi,
            'produk' => $produk,
            'filterParams' => [
                'filter_type' => $filterType,
                'selected_date' => $selectedDate
            ]
        ]);
    }


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'customer_name' => 'required|string',
                'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'tanggal_transaksi' => 'required|date',
                'total_jumlah' => 'required|numeric',
                'metode_pembayaran' => 'required|string',
                'kembalian' => 'required|numeric',
                'products' => 'required|array',
                'products.*.produk_id' => 'required|exists:produk,produk_id',
                'products.*.jumlah' => 'required|integer',
                'products.*.subtotal' => 'required|numeric',
            ]);

            \Log::info('Received transaction data:', $request->all()); // Logging

            DB::beginTransaction();
            try {
                // Handle file upload
                $fileName = null;
                if ($request->hasFile('payment_proof')) {
                    $file = $request->file('payment_proof');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/payment_proofs', $fileName);
                    \Log::info('File uploaded:', ['name' => $fileName]); // Logging
                }

                // Create main transaction
                $transaksi = Transaksi::create([
                    'customer_name' => $request->customer_name,
                    'payment_proof' => $fileName,
                    'tanggal_transaksi' => $request->tanggal_transaksi,
                    'total_jumlah' => $request->total_jumlah,
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'kembalian' => $request->kembalian,
                ]);

                \Log::info('Transaction created:', $transaksi->toArray()); // Logging

                // Create transaction details
                foreach ($request->products as $product) {
                    DetailTransaksi::create([
                        'transaksi_id' => $transaksi->transaksi_id,
                        'produk_id' => $product['produk_id'],
                        'jumlah' => $product['jumlah'],
                        'subtotal' => $product['subtotal'],
                    ]);
                }

                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => 'Transaksi berhasil',
                    'data' => $transaksi
                ]);
            } catch (\Exception $e) {
                DB::rollback();
                \Log::error('Transaction error:', ['error' => $e->getMessage()]); // Logging
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error:', $e->errors()); // Logging
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
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

    public function showReceipt(Transaksi $transaksi)
    {
        // Load the transaction with its related data
        $transaksi->load(['detailTransaksi.produk']);

        return Inertia::render('ReceiptView', [
            'transaksi' => $transaksi
        ]);
    }
}
