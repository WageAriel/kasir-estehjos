<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->string('subtotal');
            $table->string('change');
            $table->timestamps();

            // Foreign keys
            $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
