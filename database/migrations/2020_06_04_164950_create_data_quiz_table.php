<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_quiz', function (Blueprint $table) {
            $table->id();
            $table->integer('id_dataquiz');
            $table->integer('id_mapel');
            $table->string('id_sekolah');
            $table->string('id_guru');
            $table->string('id_kelas');
            $table->string('nama_quiz');
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
        Schema::table('data_quiz', function (Blueprint $table) {
            //
        });
    }
}
