<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KasirController extends Controller
{
    public function index()
    {
        return Inertia::render('KasirView');
    }

    public function search(Request $request)
    {
        $search = $request->input('search', '');

        // Query pencarian berdasarkan nama produk
        $produks = Produk::where('produk_name', 'like', '%' . $search . '%')->orWhere('produk_id', 'like', '%' . $search . '%')->get();

        // Mengembalikan data produk dalam format JSON
        return response()->json([
            'produks' => $produks
        ]);
    }
}
