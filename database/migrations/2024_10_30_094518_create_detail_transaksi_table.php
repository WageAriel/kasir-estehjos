<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('produk_id');
            $table->integer('jumlah');
            $table->string('subtotal');
            $table->string('kembali');
            $table->timestamps();

            // Foreign keys
            $table->foreign('transaksi_id')->references('transaksi_id')->on('transaksi')->onDelete('cascade');
            $table->foreign('produk_id')->references('produk_id')->on('produk')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
}
