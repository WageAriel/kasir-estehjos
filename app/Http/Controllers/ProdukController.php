<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ProdukController extends Controller
{
    public function getSembako()
{
    // Mengambil kategori 'Sembako' berdasarkan nama kategori
    $kategoriSembako = Kategori::where('kategori', 'Sembako')->first();

    if ($kategoriSembako) {
        // Mengambil produk dengan kategori 'Sembako'
        $produkSembako = Produk::where('kategori_id', $kategoriSembako->kategori_id)
            ->with('kategori')
            ->get();

        return response()->json($produkSembako);
    }

    return response()->json([]);
}

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

    public function reduceStock(Request $request)
{
    $validated = $request->validate([
        'products' => 'required|array',
        'products.*.produk_id' => 'exists:produk,produk_id',
        'products.*.quantity' => 'integer|min:1'
    ]);

    foreach ($validated['products'] as $item) {
        $product = Produk::findOrFail($item['produk_id']);

        // Check if sufficient stock
        if ($product->stok < $item['quantity']) {
            return back()->withErrors([
                'stock' => "Insufficient stock for product {$product->produk_name}"
            ]);
        }

        $product->decrement('stok', $item['quantity']);
    }

    return back()->with('success', 'Transaksi berhasil dan stok telah diperbarui');
}
}
