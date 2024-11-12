<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('makanan', function (Blueprint $table) {
            $table->id('makanan_id');
            $table->string('nama_makanan');
            $table->string('gambar_makanan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Makanan');
    }
};