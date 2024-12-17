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
            $table->string('customer_name')->nullable();
            $table->string('payment_proof')->nullable();
            $table->dateTime('tanggal_transaksi');
            $table->decimal('total_jumlah', 10, 2);
            $table->string('metode_pembayaran');
            $table->decimal('kembalian', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
