<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Msaid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msaid', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi_keluar_msaid');
            $table->integer('id_barang');
            $table->date('tgl_keluar_msaid');
            $table->integer('qty_keluar_msaid');
            $table->bigInteger('total_keluar_msaid');            
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
        Schema::dropIfExists('msaid');
    }
}
