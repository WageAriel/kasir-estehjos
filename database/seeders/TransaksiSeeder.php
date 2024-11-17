<?php
// database/seeders/TransaksiSeeder.php

namespace Database\Seeders;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 10 transaksi sample
        for ($i = 0; $i < 10; $i++) {
            // Buat transaksi utama
            $transaksi = Transaksi::create([
                'tanggal_transaksi' => Carbon::now()->subDays(rand(0, 30)),
                'total_jumlah' => 0, // akan diupdate nanti
                'metode_pembayaran' => ['cash', 'qris'][rand(0, 1)],
                'kembalian' => 0 // akan diupdate nanti
            ]);

            // Ambil 1-3 produk random untuk setiap transaksi
            $numberOfProducts = rand(1, 3);
            $total = 0;

            for ($j = 0; $j < $numberOfProducts; $j++) {
                $produk = Produk::inRandomOrder()->first();
                $jumlah = rand(1, 5);
                $subtotal = $produk->harga * $jumlah;
                $total += $subtotal;

                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->transaksi_id,
                    'produk_id' => $produk->produk_id,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal
                ]);
            }

            // Update total dan kembalian
            $pembayaran = ceil($total / 1000) * 1000; // Pembulatan ke atas ke 1000 terdekat
            $kembalian = $pembayaran - $total;

            $transaksi->update([
                'total_jumlah' => $total,
                'kembalian' => $kembalian
            ]);
        }
    }
}
