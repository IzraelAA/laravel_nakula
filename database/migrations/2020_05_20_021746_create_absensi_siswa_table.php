<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
            $table->integer('id_guru');
            $table->integer('id_kelas');
            $table->integer('id_mapel');
            $table->timestamp('masuk');
            $table->date('hari');
            $table->double('longtitude');
            $table->double('latitude');
            $table->string('gambar');
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
        Schema::table('absensi_siswa', function (Blueprint $table) {
            //
        });
    }
}
