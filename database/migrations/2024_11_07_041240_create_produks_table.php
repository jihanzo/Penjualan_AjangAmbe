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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penitipan_id')->unsigned();
            $table->string('namaproduk');
            $table->double('harga');
            $table->integer('stok');
            $table->string('foto');
            $table->text('deskripsi');
            $table->timestamps();
        });

        Schema::table('produks',function(Blueprint $table){
            $table->foreign('penitipan_id')->references('id')->on('penitipans')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produks', function(Blueprint $table) {
            $table->dropForeign('produks_penitipans_id_foreign');
        });

        Schema::table('produks', function(Blueprint $table) {
            $table->dropIndex('produks_penitipans_id_foreign');
        });

        Schema::dropIfExists('produks');
    }
};
