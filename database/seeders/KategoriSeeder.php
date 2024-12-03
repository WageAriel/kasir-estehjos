<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        // Memasukkan beberapa kategori sekaligus
        $categories = [
            ['kategori' => 'Sembako'],
            ['kategori' => 'Minuman'],
            ['kategori' => 'Kesehatan'],
            ['kategori' => 'Perawatan Pribadi'],
            ['kategori' => 'Elektronik']
        ];

        // Insert data kategori
        foreach ($categories as $category) {
            Kategori::create($category);
        }
    }
}
