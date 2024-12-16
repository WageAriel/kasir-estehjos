<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

public function getMinuman()
{
    // Mengambil kategori 'Sembako' berdasarkan nama kategori
    $kategoriMinuman = Kategori::where('kategori', 'Minuman')->first();

    if ($kategoriMinuman) {
        // Mengambil produk dengan kategori 'Minuman'
        $produkMinuman = Produk::where('kategori_id', $kategoriMinuman->kategori_id)
            ->with('kategori')
            ->get();

        return response()->json($produkMinuman);
    }

    return response()->json([]);
}

public function getAllProducts()
{
    $allProducts = Produk::with('kategori')->get()->map(function ($product) {
        return [
            'produk_id' => $product->produk_id,
            'produk_name' => $product->produk_name,
            'kategori_id' => $product->kategori_id,
            'kategori' => $product->kategori->kategori ?? null,
            'harga' => $product->harga,
            'stok' => $product->stok,
            'deskripsi' => $product->deskripsi,
            'gambar' => $product->gambar // Path relatif ke gambar
        ];
    });

    return response()->json($allProducts);
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/Sembako', $namaGambar);
            $pathGambar = 'Sembako/' . $namaGambar;
        }

        Produk::create([
            'produk_name' => $validated['produk_name'],
            'kategori_id' => $validated['kategori'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'],
            'gambar' => $pathGambar ?? null,
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $dataUpdate = [
            'produk_name' => $validated['produk_name'],
            'kategori_id' => $validated['kategori'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'],
        ];

        try {
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($produk->gambar) {
                    Storage::delete('public/' . $produk->gambar);
                }

                $gambar = $request->file('gambar');
                $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
                $gambar->storeAs('public/Sembako', $namaGambar);
                $dataUpdate['gambar'] = 'Sembako/' . $namaGambar;
            }

            $produk->update($dataUpdate);
            return response()->json(['message' => 'Produk berhasil diperbarui'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui produk', 'error' => $e->getMessage()], 500);
        }
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
