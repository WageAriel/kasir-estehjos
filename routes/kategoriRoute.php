<?php
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/dashboard/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::put('/dashboard/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/dashboard/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});

Route::get('/api/kategori', [KategoriController::class, 'indexJson']);


require __DIR__ . '/auth.php';
