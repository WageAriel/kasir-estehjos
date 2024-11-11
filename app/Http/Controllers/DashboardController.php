<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy untuk contoh
        $clients = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'johndoe@example.com'],
            ['id' => 2, 'name' => 'Jane Doe', 'email' => 'janedoe@example.com'],
        ];

        $history = [
            ['id' => 1, 'transaction' => 'Purchase', 'amount' => 100, 'date' => '2023-01-01'],
            ['id' => 2, 'transaction' => 'Refund', 'amount' => -50, 'date' => '2023-01-02'],
        ];

        // Mengirim data ke komponen Vue melalui Inertia
        return Inertia::render('HomeView', [
            'clients' => $clients,
            'history' => $history,
        ]);
    }
}
