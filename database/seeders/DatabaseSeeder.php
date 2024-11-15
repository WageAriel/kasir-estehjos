<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '123',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'nama' => 'user',
            'email' => 'user@gmail.com',
            'password' => '123',
            'role' => 'user',
        ]);
        $this->call([
            KategoriSeeder::class,
            // ProdukSeeder::class,
            TransaksiSeeder::class,
            // DetailTransaksiSeeder::class,
        ]);

    }
}
