<?php

<<<<<<< Updated upstream
use App\Http\Controllers\DashboardController;
=======
use App\Http\Controllers\FeedbackController;
>>>>>>> Stashed changes
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Models\Feedback;

// Route::get('/', function () {
//     return Inertia::render('LandingView');
// })->name('landing');


Route::get('/api/dashboard-data', [DashboardController::class, 'apiData']);
Route::get('/api/monthly-chart-data', [DashboardController::class, 'monthlyChartData']);
Route::get('/api/produk-stok-kurang', [DashboardController::class, 'getProdukStokKurang']);
Route::get('/api/produk-stok-habis', [DashboardController::class, 'getProdukStokHabis']);



Route::get('/', function () {
    return Inertia::render('Landing/LandingView', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('landing');

Route::get('/pemesanan', function () {
    return Inertia::render('Landing/pemesananView');
})->name('pemesanan');

Route::get('/cart', function () {
    return Inertia::render('Landing/CartView');
})->name('cart');

Route::get('/featured', function () {
    return Inertia::render('Landing/FeaturesView');
})->name('featured');

Route::get('/contact', function () {
    return Inertia::render('Landing/ContactView');
})->name('contact');

Route::middleware(['role:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/kasir', function () {
        return Inertia::render('KasirView');
    })->middleware(['auth', 'verified'])->name('kasir');

    Route::get('/dashboard/transaksi', function () {
        return Inertia::render('TransaksiView');
    })->middleware(['auth', 'verified'])->name('transaksi');

    Route::get('/dashboard/detail', function () {
        return Inertia::render('DetailTransaksiView');
    })->middleware(['auth', 'verified'])->name('detail');
});

// Feedback routes
Route::controller(FeedbackController::class)->group(function () {
    Route::get('/', 'index')->name('feedback.index');
    Route::post('/', 'store')->name('feedback.store');
    Route::delete('/feedback/{feedback}', 'destroy')->name('feedback.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/transaksiRoute.php';
require __DIR__.'/detailTransaksiRoute.php';
require __DIR__.'/kategoriRoute.php';
require __DIR__.'/produkRoute.php';
require __DIR__.'/kasirRoute.php';

Route::resource('produk', ProdukController::class);
Route::post('/dashboard/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');



