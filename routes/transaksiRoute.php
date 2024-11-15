<?php
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
// });
Route::get('/data-transaksi', [TransaksiController::class, 'getAllTransaksi']);

require __DIR__ . '/auth.php';
