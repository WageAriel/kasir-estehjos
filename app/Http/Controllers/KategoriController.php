<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    public function index()
    {
        return Inertia::render('KategoriView', [
            'kategori' => Kategori::all()->map(function ($kategori) {
                return [
                    'id' => $kategori->id,
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

        return Redirect::route('kategori');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return Redirect::route('kategori');
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'kategori' => 'nullable|string|max:255',
        ]);

        $kategori->update($validated);

        return Redirect::route('kategori')->with('success', 'Data kategori updated successfully');
    }
}
