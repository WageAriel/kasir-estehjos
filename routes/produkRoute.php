<?php
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/dashboard/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/dashboard/produk/{produk_id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/dashboard/produk/{produk_id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});
    
require __DIR__ . '/auth.php';
