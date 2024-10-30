<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'product_name' => 'Tea',
            'category_id' => 1,
            'price' => '10000',
            'stock' => 50,
            'description' => 'Fresh iced tea.'
        ]);
    }
}
