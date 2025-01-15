<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penitipans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_umkm');
            $table->string('pemilik_umkm');
            $table->double('harga_satuan');
            $table->double('harga_bayar');
            $table->date('tanggal');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penitipans');
    }
};
