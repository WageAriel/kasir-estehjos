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
            'produk' => Produk::with('kategori')->get()->map(function ($produk) {
                return [
                    'produk_id' => $produk->produk_id,
                    'produk_name' => $produk->produk_name,
                    'kategori' => $produk->kategori ? $produk->kategori->kategori : null,
                    'harga' => $produk->harga,
                    'stok' => $produk->stok,
                    'deskripsi' => $produk->deskripsi,
                ];
            }),
            'kategori' => Kategori::all()->map(function ($kategori) {
                return [
                    'kategori_id' => $kategori->id,
                    'kategori' => $kategori->kategori,
                ];
            })
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_name' => 'required|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        Produk::create([
            'produk_name' => $validated['produk_name'],
            'kategori_id' => $validated['kategori_id'],
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
            'kategori_id' => 'required|exists:kategori,id',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        $produk->update($validated);

        return Redirect::route('produk')->with('success', 'Produk berhasil diperbarui');
    }
}
