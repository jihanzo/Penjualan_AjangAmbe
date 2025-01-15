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
        Schema::create('hutangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penitipan_id')->unsigned();
            $table->double('jumlah_hutang');
            $table->double('jumlah_bayar');
            $table->double('sisa_hutang')->nullable()->change();
            $table->string('status');
            $table->date('tanggal');
            $table->timestamps();
        });
 
        Schema::table('hutangs',function(Blueprint $table){
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
        Schema::table('hutangs', function(Blueprint $table) {
            $table->dropForeign('hutangs_penitipan_id_foreign');
        });

        Schema::table('hutangs', function(Blueprint $table) {
            $table->dropIndex('hutangs_penitipan_id_foreign');
        });

        Schema::dropIfExists('hutangs');
    }
};
