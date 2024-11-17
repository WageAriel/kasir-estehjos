<?php
// database/seeders/ProdukSeeder.php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'produk_name' => 'Nasi Goreng',
                'harga' => 15000,
                'deskripsi' => 'Nasi goreng spesial dengan telur dan ayam',
                'kategori_id' => 1,
                'stok' => 100
            ],
            [
                'produk_name' => 'Mie Goreng',
                'harga' => 13000,
                'deskripsi' => 'Mie goreng dengan telur dan sayuran',
                'kategori_id' => 1,
                'stok' => 100
            ],
            [
                'produk_name' => 'Es Teh',
                'harga' => 5000,
                'deskripsi' => 'Es teh manis segar',
                'kategori_id' => 1,
                'stok' => 200
            ],
            [
                'produk_name' => 'Es Jeruk',
                'harga' => 7000,
                'deskripsi' => 'Es jeruk peras segar',
                'kategori_id' => 1,
                'stok' => 200
            ],
            [
                'produk_name' => 'Ayam Goreng',
                'harga' => 18000,
                'deskripsi' => 'Ayam goreng crispy',
                'kategori_id' => 1,
                'stok' => 50
            ],
        ];

        foreach ($products as $product) {
            Produk::create($product);
        }
    }
}
