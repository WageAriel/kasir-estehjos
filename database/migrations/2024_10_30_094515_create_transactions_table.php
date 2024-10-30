<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->dateTime('transaction_date');
            $table->unsignedBigInteger('cashier_id');
            $table->string('total_amount');
            $table->string('payment_method');
            $table->timestamps();

            // Foreign key
            $table->foreign('cashier_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
