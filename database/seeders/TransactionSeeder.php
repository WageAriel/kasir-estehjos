<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        Transaction::create([
            'transaction_date' => now(),
            // 'cashier_id' => 1,
            'total_amount' => '10000',
            'payment_method' => 'Cash'
        ]);
    }
}
