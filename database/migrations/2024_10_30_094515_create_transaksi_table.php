<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('transaksi_id');
            $table->dateTime('tanggal_transaksi');
            $table->decimal('total_jumlah', 12, 2); // Menggunakan decimal untuk nilai uang
            $table->string('metode_pembayaran');
            $table->decimal('kembalian', 12, 2); // Menggunakan decimal untuk nilai uang
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
