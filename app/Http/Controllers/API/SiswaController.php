<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    public function all(Request $request)
    {

        $id_siswa = $request->input('id_siswa');
        // $limit = $request->input('limit',6);
        // $name = $request->input('nama_siswa');
        // $nis = $request->input('nis');
        // $password = $request->input('password');
        // $foto = $request->input('foto');
        // $siswa = DB::table('siswa')->get();

        if ($id_siswa) {
            $siswa = DB::table('siswa')->where('id_siswa', $id_siswa)->get();

            if ($siswa)
                return ResponseFormatter::success($siswa, 'Data Siswa Berhasil Diambil');
            else
                return ResponseFormatter::error(null, 'Data Siswa Tidak ada');
        }
    }

    public function login(Request $request)
    {
        $nis = $request->input('nama_siswa');
        $password = $request->input('password');
        $_login = DB::table('siswa')->where(
            'nis',
            '=',
            $nis
        )->where(
            'password',
            '=',
            $password
        )->count();
        $_login1 = DB::table('siswa')->where(
            'nis',
            '=',
            $nis
        )->where(
            'password',
            '=',
            $password
        )->get();
        if ($_login == 1)
            return ResponseFormatter::success($_login1, 'Data Siswa Berhasil Login');
        else
            return ResponseFormatter::error(null, 'Data Siswa Tidak Ada');
    }
}
