<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['category_name' => 'Beverages']);
        Category::create(['category_name' => 'Snacks']);
        Category::create(['category_name' => 'Desserts']);
    }
}
