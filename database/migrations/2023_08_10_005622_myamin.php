<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Myamin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myamin', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi_keluar_myamin');
            $table->integer('id_barang');
            $table->date('tgl_keluar_myamin');
            $table->integer('qty_keluar_myamin');
            $table->bigInteger('total_keluar_myamin');            
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
        Schema::dropIfExists('myamin');
    } 
}
