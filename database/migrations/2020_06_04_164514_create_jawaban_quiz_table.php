<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_quiz', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
            $table->integer('id_quiz');
            $table->integer('id_dataquiz');
            $table->string('jawaban');
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
        Schema::table('jawaban_quiz', function (Blueprint $table) {
            //
        });
    }
}
