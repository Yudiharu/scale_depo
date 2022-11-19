<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('no_transaksi');
            $table->string('no_polisi');
            $table->string('nama_barang');
            $table->string('nama_supir');
            $table->string('no_po');
            $table->text('keterangan');
            $table->datetime('tanggal_masuk');
            $table->time('jam_masuk')->nullable();
            $table->integer('berat1');
            $table->integer('berat2');
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
        Schema::dropIfExists('transaksis');
    }
}
