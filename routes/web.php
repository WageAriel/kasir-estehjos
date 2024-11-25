<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('LandingView');
})->name('landing');

Route::get('/pemesanan', function () {
    return Inertia::render('pemesananView');
})->name('pemesanan');

Route::get('/cart', function () {
    return Inertia::render('CartView');
})->name('cart');

Route::get('/featured', function () {
    return Inertia::render('FeaturesView');
})->name('featured');

Route::get('/contact', function () {
    return Inertia::render('ContactView');
})->name('contact');

Route::get('/dashboard', function () {
    return Inertia::render('HomeView');
  })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/kasir', function () {
    return Inertia::render('KasirView');
  })->middleware(['auth', 'verified'])->name('kasir');

Route::get('/dashboard/transaksi', function () {
    return Inertia::render('TransaksiView');
  })->middleware(['auth', 'verified'])->name('transaksi');

Route::get('/dashboard/detail', function () {
    return Inertia::render('DetailTransaksiView');
  })->middleware(['auth', 'verified'])->name('detail');

  
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
require __DIR__.'/detailTransaksiRoute.php';
require __DIR__.'/kategoriRoute.php';
require __DIR__.'/produkRoute.php';
require __DIR__.'/kasirRoute.php';
