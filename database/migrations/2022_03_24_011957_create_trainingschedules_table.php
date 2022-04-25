<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingschedules', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelatihan');
            $table->string('slug')->unique();
            $table->integer('jumlah_peserta');
            $table->date('tanggal_start');
            $table->date('tanggal_end');
            $table->integer('lama_jpl');
            $table->integer('lama_hari');
            $table->string('metode');
            $table->string('instansi_penyelenggara');
            $table->string('tempat_penyelenggaraan');
            $table->string('sumber_dana');
            $table->foreignId('pengendaliPelatihan_id')->nullable();
            $table->foreignId('penanggungJawab_id')->nullable();
            $table->foreignId('ketuaPanitia_id')->nullable();
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
        Schema::dropIfExists('trainingschedules');
    }
}
