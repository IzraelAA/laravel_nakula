<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/ 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('siswa', 'API\SiswaController@all');
Route::post('login', 'API\SiswaController@login');
Route::post('absensi', 'API\AbsensiController@absensi');
Route::post('get_absensi', 'API\AbsensiController@get_absensi');
Route::post('jadwal', 'API\JadwalController@jadwal');
Route::post('mapel', 'API\JadwalController@mata_pelajaran');
Route::post('materi', 'API\MateriController@materi');
Route::post('data-quiz', 'API\QuizController@data_quiz');
Route::post('soal-quiz', 'API\QuizController@soal_quiz');
Route::post('jawaban-quiz', 'API\QuizController@jawaban_quiz');
Route::post('nilai', 'API\NilaiController@nilai');
Route::post('data-nilai', 'API\NilaiController@data_nilai');
Route::post('raport', 'API\RapotController@raport');
Route::post('detailraport', 'API\RapotController@detailraport');
