<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ProdukController extends Controller
{
    
    public function index()
    {
        return Inertia::render('ProdukView', [
            'kategoriOptions' => Kategori::all(),
            'produk' => Produk::with(['kategori'])->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_name' => 'required|max:255',
            'kategori' => 'required|exists:kategori,kategori_id',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        Produk::create([
            'produk_name' => $validated['produk_name'],
            'kategori_id' => $validated['kategori'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'],
        ]);

        return Redirect::route('produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return Redirect::route('produk')->with('success', 'Produk berhasil dihapus');
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'produk_name' => 'required|max:255',
            'kategori' => 'required|exists:kategori,kategori_id',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        $produk->update([
            'produk_name' => $validated['produk_name'],
            'kategori_id' => $validated['kategori'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'],
        ]);
        return Redirect::route('produk')->with('success', 'Produk berhasil diperbarui');
    }
}
