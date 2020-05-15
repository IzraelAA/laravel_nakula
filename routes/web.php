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

Route::get('/', function () {
    return view('login');
});

Route::post('/loginadmin','NakulaController@loginadmin');
Route::post('/uploadsekolah','NakulaController@uploadsekolah');
Route::post('/tambahadmin','NakulaController@tambahadmin');
Route::get('/tambahadminlihat','NakulaController@tambahadminlihat')->name('tambahadminlihat');
Route::get('/sekolah','NakulaController@sekolah')->name('sekolah');
Route::get('/dashboard','NakulaController@dashboard')->name('dashboard');
Route::get('/admin','NakulaController@admin')->name('admin');
