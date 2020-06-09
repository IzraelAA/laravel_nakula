<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JadwalController extends Controller
{
    public function jadwal(Request $request)
    {
        $data['id'] = $request->input('id_kelas');

        // 

        $relasi = DB::table('jadwal_pelajaran')
            ->join('kelas', 'jadwal_pelajaran.id_kelas', '=', 'kelas.id_kelas')
            ->join('sekolah', 'jadwal_pelajaran.id_sekolah', '=', 'sekolah.id_sekolah')
            ->join('mata_pelajaran', 'jadwal_pelajaran.id_mapel', '=', 'mata_pelajaran.id_mapel')
            ->join('guru', 'jadwal_pelajaran.id_guru', '=', 'guru.id_guru')
            ->where('jadwal_pelajaran.id_kelas', $data['id'])
            ->get();

        if ($relasi)
            return ResponseFormatter::success($relasi, 'Data  Berhasil Diambil');
        else
            return ResponseFormatter::error(null, 'Data  Tidak ada');

        // foreach ($relasi as $data) :

        //     print_r($data);
        // endforeach;
    }

    public function mata_pelajaran(Request $request)
    {
        $data['id'] = $request->input('id_kelas');

        $mapel = DB::table('mata_pelajaran')
            ->join('guru', 'mata_pelajaran.id_guru', '=', 'guru.id_guru')
            ->where('mata_pelajaran.id_kelas', $data['id'])
            ->get();

        if ($mapel)
            return ResponseFormatter::success($mapel, 'Data  Berhasil Diambil');
        else
            return ResponseFormatter::error(null, 'Data Siswa Tidak ada');
    }
}
