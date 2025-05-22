<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Juanda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juanda', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi_keluar_juanda');
            $table->integer('id_barang');
            $table->date('tgl_keluar_juanda');
            $table->integer('qty_keluar_juanda');
            $table->bigInteger('total_keluar_juanda');            
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
        Schema::dropIfExists('juanda');
    } 
}
