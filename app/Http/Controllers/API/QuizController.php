<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class QuizController extends Controller
{
  public function data_quiz(Request $request)
  {
    $data['id'] = $request->input('id_kelas');

    // 

    $relasi = DB::table('data_quiz')
      ->join('mata_pelajaran', 'data_quiz.id_mapel', '=', 'mata_pelajaran.id_mapel')
      ->join('guru', 'data_quiz.id_guru', '=', 'guru.id_guru')
      ->where('mata_pelajaran.id_kelas', $data['id'])
      ->get();

    if ($relasi)
      return ResponseFormatter::success($relasi, 'Data  Berhasil Diambil');
    else
      return ResponseFormatter::error(null, 'Data  Tidak ada');

    // foreach ($relasi as $data) :

    //     print_r($data);
    // endforeach;
  }

  public function soal_quiz(Request $request)
  {
      $i = 0;
      $quiz = DB::table('quiz')
      ->where('id_dataquiz', $request->input('id_dataquiz'))
      ->get();
        foreach ($quiz as $key => $value) { 
            $quiz[$i]->nomer =$i+1 ;
            $i++;
        
        }  
    if ($quiz)
      return ResponseFormatter::success($quiz, 'Data  Berhasil Diambil');
    else
      return ResponseFormatter::error(null, 'Data  Tidak ada');
  }

  public function jawaban_quiz(Request $request)
  {
    $data = DB::table('jawaban_quiz')->insert([
      'id_siswa' => request('id_siswa'),
      'id_quiz' => request('id_quiz'),
      'id_dataquiz' => request('id_dataquiz'),
      'jawaban' => request('jawaban'),
      'nilai' => request('nilai'),

    ]);

    return ResponseFormatter::success($data, 'Data Siswa Berhasil Ditambahkan');
  }
}
