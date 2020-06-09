<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_nilai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_nilai');
            $table->integer('id_kelas');
            $table->integer('id_mapel');
            $table->integer('id_sekolah');
            $table->integer('id_guru');

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
        Schema::table('data_nilai', function (Blueprint $table) {
            //
        });
    }
}
