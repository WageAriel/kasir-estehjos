<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionDetail;

class TransactionDetailSeeder extends Seeder
{
    public function run()
    {
        TransactionDetail::create([
            'transaction_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'subtotal' => '10000',
            'change' => '0'
        ]);
    }
}
