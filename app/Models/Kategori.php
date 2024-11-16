<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'kategori';

    // Menentukan primary key jika tidak menggunakan 'id' default
    protected $primaryKey = 'kategori_id';

    // Menentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'kategori',
    ];

    // Definisikan relasi dengan model Produk
    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id', 'kategori_id');
    }

    // Jika relasi ke User juga diperlukan, Anda bisa menambahkan method berikut
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
