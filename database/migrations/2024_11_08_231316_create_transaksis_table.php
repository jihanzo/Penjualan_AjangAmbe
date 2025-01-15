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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->double('total');
            $table->timestamps();
        });

        Schema::table('transaksis',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::table('transaksis', function(Blueprint $table) {
            $table->dropForeign('transaksis_user_id_foreign');
        });

        Schema::table('transaksis', function(Blueprint $table) {
            $table->dropIndex('transaksis_user_id_foreign');
        });

        Schema::dropIfExists('transaksis');
    }
};
