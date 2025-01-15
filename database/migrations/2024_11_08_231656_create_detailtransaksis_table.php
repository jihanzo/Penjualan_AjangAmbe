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
        Schema::create('detailtransaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaksi_id')->unsigned();
            $table->bigInteger('produk_id')->unsigned();
            $table->integer('qty');
            $table->double('harga');
            $table->timestamps();
        });

        Schema::table('detailtransaksis',function(Blueprint $table){
            $table->foreign('transaksi_id')->references('id')->on('transaksis')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')
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
        Schema::table('detailtransaksis', function(Blueprint $table) {
            $table->dropForeign('detailtransaksis_transaksi_id_foreign');
        });

        Schema::table('detailtransaksis', function(Blueprint $table) {
            $table->dropIndex('detailtransaksis_transaksi_id_foreign');
        });

        Schema::table('detailtransaksis', function(Blueprint $table) {
            $table->dropForeign('detailtransaksis_produk_id_foreign');
        });

        Schema::table('detailtransaksis', function(Blueprint $table) {
            $table->dropIndex('detailtransaksis_produk_id_foreign');
        });

        Schema::dropIfExists('detailtransaksis');
    }
};
