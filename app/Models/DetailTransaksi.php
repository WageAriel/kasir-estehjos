<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    // Tentukan nama table jika berbeda dengan konvensi plural Laravel
    protected $table = 'detail_transaksi';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'jumlah',
        'subtotal',
        'kembali',
    ];

    // Tentukan relasi dengan model Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    // Tentukan relasi dengan model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
