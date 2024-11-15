<?php
use App\Http\Controllers\DetailTransaksiController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/detail', [DetailTransaksiController::class, 'index'])->name('detail');
// });
Route::get('/data-detail', [DetailTransaksiController::class, 'getAllDetail']);

require __DIR__ . '/auth.php';
