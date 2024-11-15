<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        Transaksi::create([
            'tanggal_transaksi' => now(),
            // 'cashier_id' => 1,
            'total_jumlah' => '10000',
            'metode_pembayaran' => 'Cash'
        ]);
    }
}
