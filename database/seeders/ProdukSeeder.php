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
                'produk_id' => '89686010718',
                'produk_name' => 'Indomie Goreng Cabe Ijo 85g',
                'harga' => 3000,
                'deskripsi' => 'Mi instan goreng dengan rasa cabe ijo yang pedas dan nikmat.',
                'kategori_id' => 1,
                'stok' => 500,
                'gambar' => 'Sembako/Indomie Geprek.png'
            ],
            [
                'produk_id' => '89686043686',
                'produk_name' => 'Indomie Goreng Iga Penyet 80g',
                'harga' => 3200,
                'deskripsi' => 'Mi instan goreng dengan rasa iga penyet pedas gurih.',
                'kategori_id' => 1,
                'stok' => 500,
                'gambar' => 'Sembako/Indomie Rendang.png'
            ],
            [
                'produk_id' => '89686011036',
                'produk_name' => 'Indomie Goreng Pedas 80g',
                'harga' => 3000,
                'deskripsi' => 'Mi instan goreng dengan sensasi pedas nikmat.',
                'kategori_id' => 1,
                'stok' => 500,
                'gambar' => 'Sembako/Indomie Goreng.png'
            ],
            [
                'produk_id' => '89686010015',
                'produk_name' => 'Indomie Ayam Bawang 69g',
                'harga' => 2800,
                'deskripsi' => 'Mi instan kuah dengan rasa ayam bawang yang klasik.',
                'kategori_id' => 1,
                'stok' => 500,
                'gambar' => 'Sembako/Indomie Ayam Bawang.png'
            ],
            [
                'produk_id' => '89686043990',
                'produk_name' => 'Indomie Soto Lamongan 90g',
                'harga' => 3200,
                'deskripsi' => 'Mi instan kuah dengan rasa soto lamongan asli Indonesia.',
                'kategori_id' => 1,
                'stok' => 500,
                'gambar' => 'Sembako/Sedap Soto.png'
            ],
            [
                'produk_id' => '89686910704',
                'produk_name' => 'Indomie Goreng Rendang 91g',
                'harga' => 3600,
                'deskripsi' => 'Mi instan goreng dengan rasa rendang kaya rempah khas Indonesia.',
                'kategori_id' => 1,
                'stok' => 500,
                'gambar' => 'Sembako/Indomie Rendang.png'
            ],
            [
                'produk_id' => '8992727005104',
                'produk_name' => 'Aqua 500ml',
                'harga' => 6000,
                'deskripsi' => 'Sabun pembersih wajah pria dengan sensasi dingin untuk kulit berminyak.',
                'kategori_id' => 2,
                'stok' => 200,
                'gambar' => 'Minuman/Aqua.png'
            ],
            [
                'produk_id' => '8997009510055',
                'produk_name' => 'C1000 100ml',
                'harga' => 15000,
                'deskripsi' => 'Sabun pembersih wajah pria dengan sensasi dingin untuk kulit berminyak.',
                'kategori_id' => 2,
                'stok' => 200,
                'gambar' => 'Minuman/C1000.png'
            ],
            [
                'produk_id' => '89686010343',
                'produk_name' => 'Indomie Soto Mie 70g',
                'harga' => 3000,
                'deskripsi' => 'Mi instan kuah dengan rasa soto mie yang menyegarkan.',
                'kategori_id' => 1,
                'stok' => 500,
                'gambar' => 'Sembako/Sedap Soto.png'
            ],
            [
                'produk_id' => '89686010527',
                'produk_name' => 'Indomie Kari Ayam 72g',
                'harga' => 3000,
                'deskripsi' => 'Mi instan kuah dengan rasa kari ayam yang lezat.',
                'kategori_id' => 1,
                'stok' => 500,
                'gambar' => 'Sembako/Indomie Ayam Bawang.png'
            ],
            [
                'produk_id' => '8999908039309',
                'produk_name' => 'OSKADON OBAT SAKIT KEPALA 4’SSTR',
                'harga' => 4000,
                'deskripsi' => 'Obat Sakit Kepala',
                'kategori_id' => 3,
                'stok' => 500,
                'gambar' => 'Kesehatan/OSKADON OBAT SAKIT KEPALA 4’SSTR.png'
            ],
            [
                'produk_id' => '8999908043801',
                'produk_name' => 'OSKADON SP OBAT PEREDA NYERI 4’SSTR',
                'harga' => 4500,
                'deskripsi' => 'Obat Sakit Kepala & pereda nyeri',
                'kategori_id' => 3,
                'stok' => 500,
                'gambar' => 'Kesehatan/OSKADON SP OBAT PEREDA NYERI 4’SSTR.png'
            ],
            [
                'produk_id' => '8999999045579',
                'produk_name' => 'VASELINE ADVANCED STRENGT 200 ML',
                'harga' => 7000,
                'deskripsi' => 'Lotion untuk kulit yang kering',
                'kategori_id' => 3,
                'stok' => 500,
                'gambar' => 'Perawatan/VASELINE ADVANCED STRENGT 200 ML.png'
            ],
            [
                'produk_id' => '8999999715069',
                'produk_name' => 'VASELINE ALOE COOL FRESH 100 ML',
                'harga' => 5000,
                'deskripsi' => 'Lotion untuk kulit yang kering',
                'kategori_id' => 3,
                'stok' => 500,
                'gambar' => 'Perawatan/VASELINE ALOE COOL FRESH 100 ML.png'
            ],
            [
                'produk_id' => '8886022971298',
                'produk_name' => 'ALKALINE AA-LR6',
                'harga' => 4000,
                'deskripsi' => 'Baterai untuk perangkat elektronik',
                'kategori_id' => 3,
                'stok' => 500,
                'gambar' => 'Elektronik/ALKALINE AA-LR6.png'
            ],
        ];

        foreach ($products as $product) {
            Produk::create($product);
        }
    }
}
