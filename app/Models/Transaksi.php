<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $fillable = [
        'tanggal_transaksi',
        'total_jumlah',
        'metode_pembayaran',
        'kembalian'
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'detail_transaksi', 'transaksi_id', 'produk_id')
            ->withPivot('jumlah', 'subtotal');
    }
}
