<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailTransaksi;

class DetailTransaksiSeeder extends Seeder
{
    public function run()
    {
        DetailTransaksi::create([
            'transaksi_id' => 1,
            'produk_id' => 1,
            'jumlah' => 1,
            'subtotal' => '10000',
            'kembalian' => '500'
        ]);
    }
}
