<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iventaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('type')->nullable();
            $table->string('kode_barang');
            $table->string('kode_lokasi')->nullable();
            $table->string('NUP')->nullable();
            $table->string('thn_pembelian');
            $table->string('jumlah');
            $table->string('harga');
            $table->string('kondisi');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('iventaris');
    }
}
