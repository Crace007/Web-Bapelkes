<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileusers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->foreignId('user_id');
            $table->foreignId('filecategory_id');
            $table->string('nama_file');
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
        Schema::dropIfExists('fileusers');
    }
}
