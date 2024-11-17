<?php
use App\Http\Controllers\KasirController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/kasir', [KasirController::class, 'index'])->name('kasir');
Route::get('/dashboard/kasir/search', [KasirController::class, 'search'])->name('kasir.search');

require __DIR__ . '/auth.php';
