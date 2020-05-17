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
Route::get('/mata_pelajaran', 'MapelController@tambahmapelview')->name('mata_pelajaran');
Route::post('/loginadmin', 'NakulaController@loginadmin');
Route::resource('admin', 'AdminController');
Route::resource('sekolah', 'SekolahController');
Route::resource('nakula', 'NakulaController');
Route::resource('mapel', 'MapelController');
