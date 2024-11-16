<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    public function indexJson()
    {
        return response()->json(Kategori::all()->map(function ($kategori) {
            return [
                'kategori_id' => $kategori->kategori_id,
                'kategori' => $kategori->kategori,
            ];
        }));
    }
    
    public function index()
    {
        return Inertia::render('KategoriView', [
            'kategori' => Kategori::all()->map(function ($kategori) {
                return [
                    'kategori_id' => $kategori->kategori_id,
                    'kategori' => $kategori->kategori,
                ];
            })
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|max:255',
        ]);

        Kategori::create([
            'kategori' => $validated['kategori'],
        ]);

        return Redirect::route('kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return Redirect::route('kategori')->with('success', 'Kategori berhasil dihapus');
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'kategori' => 'nullable|string|max:255',
        ]);

        $kategori->update($validated);

        return Redirect::route('kategori')->with('success', 'Kategori berhasil diperbarui');
    }
}
