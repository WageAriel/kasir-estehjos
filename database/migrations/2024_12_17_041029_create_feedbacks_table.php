<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->unsignedBigInteger('user_id')->nullable(); // Make user_id nullable
            $table->text('feedback');
            $table->timestamps();

            // Optional: Add foreign key constraint if you want to link to users
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null'); // or 'cascade' depending on your requirement
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
};
