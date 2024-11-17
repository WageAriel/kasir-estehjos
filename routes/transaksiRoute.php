<?php
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('dashboard/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::put('dashboard/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::put('dashboard/transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('dashboard/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});
// Route::get('/data-transaksi', [TransaksiController::class, 'getAllTransaksi']);

require __DIR__ . '/auth.php';
