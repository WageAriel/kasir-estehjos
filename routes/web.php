<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('LandingView');
})->name('landing');

Route::get('/pemesanan', function () {
    return Inertia::render('pemesananView');
})->name('pemesanan');

Route::get('/dashboard', function () {
    return Inertia::render('HomeView');
  })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/produk', function () {
    return Inertia::render('ProdukView');
  })->middleware(['auth', 'verified'])->name('produk');

Route::get('/dashboard/kasir', function () {
    return Inertia::render('KasirView');
  })->middleware(['auth', 'verified'])->name('kasir');

  Route::get('/dashboard/kategori', [KategoriController::class, 'index'])
  ->middleware(['auth', 'verified'])
  ->name('kategori');

  Route::post('/dashboard/kategori', [KategoriController::class, 'store'])
  ->middleware(['auth', 'verified'])
  ->name('kategori.store');
  
  Route::delete('/dashboard/kategori/{kategori}', [KategoriController::class, 'destroy'])
  ->middleware(['auth', 'verified'])
  ->name('kategori.destroy');

  Route::put('/dashboard/kategori/{kategori}', [KategoriController::class, 'update'])
  ->middleware(['auth', 'verified'])
  ->name('kategori.update');
  
Route::get('/dashboard/transaction', function () {
    return Inertia::render('TransactionView');
  })->middleware(['auth', 'verified'])->name('transaction');

Route::get('/dashboard/transaction-detail', function () {
    return Inertia::render('TransactionDetailView');
  })->middleware(['auth', 'verified'])->name('transactionDetail');

//   Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Home');
// })->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/transaksiRoute.php';
