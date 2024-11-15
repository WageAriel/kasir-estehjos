<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
        ]);
        $this->call([
            KategoriSeeder::class,
            // ProdukSeeder::class,
            TransaksiSeeder::class,
            // DetailTransaksiSeeder::class,
        ]);

    }
}
