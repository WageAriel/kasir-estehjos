<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'kategori' => 'Makanan',
        ]);
    }
}
