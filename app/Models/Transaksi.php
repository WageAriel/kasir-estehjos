<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow Laravel's convention (which it does here)
    protected $table = 'transaksi';

    // Define the primary key if it doesn't follow Laravel's default of 'id'
    protected $primaryKey = 'transaksi_id';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'tanggal_transaksi',
        'total_jumlah',
        'metode_pembayaran',
    ];

    // Define the types of these attributes if necessary
    protected $casts = [
        'tanggal_transaksi' => 'datetime',
        'total_jumlah' => 'string', // Alternatively, if this is numeric, change to 'float' or 'decimal'
    ];

    // If you don't want Laravel to maintain created_at and updated_at columns automatically
    public $timestamps = true;
}
