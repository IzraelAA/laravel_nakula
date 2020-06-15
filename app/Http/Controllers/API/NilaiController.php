<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NilaiController extends Controller
{
    
   
  public function nilai(Request $request)
  {
    $siswa = $request->input('id_siswa');
    $data = $request->input('id_datanilai');
    $id =$nilai = DB::table('nilai')->where('id_siswa','=', $siswa )->count();
   $nilai = DB::table('nilai')->join('data_nilai','nilai.id_datanilai','=','data_nilai.id_datanilai')->where('id_siswa','=', $siswa )->where('data_nilai.id_datanilai','=' ,$data)->get();
   
    if($id > 0 ){
    return ResponseFormatter::success($nilai, 'Data Nilai berhasil diambil');}
    else
    {return ResponseFormatter::error(null, 'Data Siswa Tidak Ada');}

  }
  
   public function data_nilai(Request $request)
    {
    $siswa = $request->input('id_kelas');
    $id =$nilai = DB::table('data_nilai')->where('id_kelas','=', $siswa )->count();
    $nilai = DB::table('data_nilai')->join('mata_pelajaran','data_nilai.id_mapel','=','mata_pelajaran.id_mapel')->join('guru','data_nilai.id_guru','=','guru.id_guru')->where('data_nilai.id_kelas','=', $siswa )->get();
   
    if($id > 0 )
    return ResponseFormatter::success($nilai, 'Data Nilai berhasil diambil');
    else
    return ResponseFormatter::error(null, 'Data Siswa Tidak Ada');
    
    }

  

}
