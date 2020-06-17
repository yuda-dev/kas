<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kas_mesjid', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uraian');
            $table->integer('masuk');
            $table->integer('keluar');
            $table->enum('jenis',['Masuk','Keluar']);
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
        Schema::dropIfExists('tb_kas_mesjid');
    }
}
