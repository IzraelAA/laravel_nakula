<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'NakulaController@login')->name('login');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::post('/loginadmin', 'NakulaController@loginadmin')->name('loginadmin');
Route::resource('superadmin', 'SuperAdminController');
Route::resource('guru', 'GuruController');
Route::resource('sekolah', 'SekolahController');
Route::resource('nakula', 'NakulaController');
Route::resource('mapel', 'MapelController');
Route::get('/guru/export_excel', 'AdminController@export_excel');
Route::post('/guru/import_excel', 'AdminController@import_excel')->name('import');
Route::resource('admin', 'AdminController');
Route::resource('kelas', 'KelasController');
Route::resource('siswa', 'SiswaController');
Route::resource('jadwal', 'JadwalController');
Route::resource('materi', 'MateriController');
Route::resource('absensi', 'AbsensiController');
Route::resource('namamapel', 'NamaMapelController');
Route::resource('soal-ganda', 'SoalGandaController');
Route::resource('pembayaran', 'PembayaranController');
Route::get('laporan-pdf', 'PdfController@download');
Route::resource('guru-siswa', 'GuruSiswaController');
Route::resource('guru-jadwal', 'GuruJadwalController');
Route::resource('guru-soal', 'GuruSoalController');
Route::resource('guru-nilai', 'NilaiController');
Route::resource('guru-quiz', 'GuruQuizController');
Route::POST('/insert-quiz', 'GuruQuizController@insert')->name('insert-quiz');
Route::resource('quiz', 'QuizController');
Route::POST('/', 'quizController@insert')->name('insert');
Route::POST('/guru', 'NilaiController@tambah')->name('tambah-nilai');
