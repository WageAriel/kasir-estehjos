<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Kategori::create(['kategori_name' => 'Makanan Berat']);
        Kategori::create(['kategori_name' => 'Makanan Ringan']);
        Kategori::create(['kategori_name' => 'Makanan Penutup']);
    }
}
