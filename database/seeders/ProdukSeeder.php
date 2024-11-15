<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        Produk::create([
            'produk_name' => 'Teh',
            'kategori_id' => 1,
            'harga' => '10000',
            'stok' => 50,
            'deskripsi' => 'Es Teh Segar.'
        ]);
    }
}
