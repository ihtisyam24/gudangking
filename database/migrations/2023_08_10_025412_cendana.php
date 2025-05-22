<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cendana extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cendana', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi_keluar_cendana');
            $table->integer('id_barang');
            $table->date('tgl_keluar_cendana');
            $table->integer('qty_keluar_cendana');
            $table->bigInteger('total_keluar_cendana');            
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
        Schema::dropIfExists('cendana');
    } 
}
