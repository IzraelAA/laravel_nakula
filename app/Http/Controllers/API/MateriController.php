<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MateriController extends Controller
{
  public function materi(Request $request)
  {
    $data['id'] = $request->input('id_kelas');

    // 

    $relasi = DB::table('materi')
      ->join('mata_pelajaran', 'materi.id_mapel', '=', 'mata_pelajaran.id_mapel')
      ->join('guru', 'materi.id_guru', '=', 'guru.id_guru')
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
}
