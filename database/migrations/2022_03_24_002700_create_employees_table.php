<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nip')->unique();
            $table->foreignId('pangkat_id');
            $table->foreignId('jabatan_id');
            $table->date('tanggal_pangkat');
            $table->integer('masaKerja_thn');
            $table->integer('masaKerja_bln');
            $table->string('latihanJabatan_diklat')->nullable();
            $table->integer('latihanJabatan_tahun')->nullable();
            $table->string('pendidikan_terakhir');
            $table->string('keterangan')->nullable();
            $table->string('foto_pegawai')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
