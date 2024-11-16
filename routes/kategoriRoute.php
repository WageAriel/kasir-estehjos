<?php
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/dashboard/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::put('/dashboard/kategori/{kategori_id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/dashboard/kategori/{kategori_id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});

require __DIR__ . '/auth.php';
