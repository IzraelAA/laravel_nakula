<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['id'] = $request->session()->get('id_sekolah');

        $absen = DB::table('absensi_siswa')
            ->join('siswa', 'absensi_siswa.id_siswa', '=', 'siswa.id_siswa')
            ->join('guru', 'absensi_siswa.id_guru', '=', 'guru.id_guru')
            ->join('kelas', 'absensi_siswa.id_kelas', '=', 'kelas.id_kelas')
            ->join('mata_pelajaran', 'absensi_siswa.id_mapel', '=', 'mata_pelajaran.id_mapel')
            ->where('guru.id_sekolah', $data['id'])->get();
        // dd($absen);

        return view('superadmin.absensi.index', ['absen' => $absen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
