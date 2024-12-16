<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari nama model (opsional)
    protected $table = 'produk';

    // Menentukan primary key (opsional, jika menggunakan 'id' maka ini tidak perlu)
    protected $primaryKey = 'produk_id';

    // Menentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'produk_id',
        'produk_name',
        'kategori_id',
        'harga',
        'stok',
        'deskripsi',
        'gambar'
    ];

    // Menentukan relasi dengan model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
