<?php
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/api/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::post('/dashboard/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/dashboard/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});
Route::get('/produk/search', [ProdukController::class, 'search'])->name('produk.search');
Route::get('/produk/sembako', [ProdukController::class, 'getSembako'])->name('produk.sembako');
Route::get('/produk/minuman', [ProdukController::class, 'getMinuman'])->name('produk.Minuman');
Route::post('/reduce-stock', [ProdukController::class, 'reduceStock'])
    ->name('produk.reduce-stock');
Route::get('/produk/all', [ProdukController::class, 'getAllProducts'])->name('produk.all');
require __DIR__ . '/auth.php';
