<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function absensi(Request $request)
    {
        $hari = date('D');
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H:i:s');
        var_dump($jam);
        
        
        $absen = DB::table('jadwal_pelajaran')
                ->where('masuk' ,'<', $jam)
                ->where('keluar', '>', $jam)->where('hari','=', $hari_ini)->first();
                print_r($absen);
                
        if($absen = 1){
            
        $absen = DB::table('jadwal_pelajaran')
                ->where('masuk' ,'<', $jam)
                ->where('keluar', '>', $jam)->where('hari','=', $hari_ini)->first();
        $data = DB::table('absensi_siswa')->insert([
            'id_siswa' => request('id_siswa'),
            'id_guru' => $absen->id_guru,
            'id_kelas' => $absen->id_kelas,
            'id_mapel' => $absen->id_mapel,
            'hari' => $hari_ini,
            'longtitude' => request('longtitude'),
            'latitude' => request('latitude'),
            'gambar' => request('gambar'),
        ]);

        return ResponseFormatter::success($data, 'Data Siswa Berhasil Ditambahkan');
        }
      else{
        return ResponseFormatter::error(null, 'Data Siswa Gagal Ditambahkan');    
        }
    }
}
