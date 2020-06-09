<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $guru['id_guru'] = $request->session()->get('id_guru');
        $guru['id_sekolah'] = $request->session()->get('id_sekolah');
        $mapel = DB::table('mata_pelajaran')->where('id_guru', $guru['id_guru'])->get();
        $nilai = DB::table('data_nilai')
            ->join('kelas', 'data_nilai.id_kelas', '=', 'kelas.id_kelas')
            ->join('mata_pelajaran', 'data_nilai.id_mapel', '=', 'mata_pelajaran.id_mapel')->get();

        return view('guru.nilai.index', [
            'mapel' => $mapel,
            'guru' => $guru,
            'nilai' => $nilai
        ]);
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
        $jadwal = DB::table('mata_pelajaran')->where('id_mapel', request('id_mapel'))->get();
        // dd($jadwal);
        $array = json_decode(json_encode($jadwal), true);
        $datajadwal = $array['0'];
        // dd($datajadwal);

        DB::table('data_nilai')->insert([
            'nama_nilai' => request('nama_nilai'),
            'id_kelas' => $datajadwal['id_kelas'],
            'id_mapel' => request('id_mapel'),
            'id_sekolah' => request('id_sekolah'),
            'id_guru' => request('id_guru'),

        ]);

        return redirect()->route('guru-nilai.index')->with('create', ' Berhasil Ditambah!!');
    }

    public function tambah(Request $request)
    {


        DB::table('nilai')->insert([
            'id_datanilai' => request('id_datanilai'),
            'id_siswa' => request('id_siswa'),
            'nilai' => request('nilai'),

        ]);

        return redirect()->route('guru-nilai.edit', request('id_datanilai'))->with('create', ' Berhasil Ditambah!!');
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


        $data = $id;
        $nilai = DB::table('data_nilai')->where('id_datanilai', $data)->first();

        $siswa = DB::table('siswa')
            ->join('data_nilai', 'siswa.id_kelas', '=', 'data_nilai.id_kelas')->where('siswa.id_kelas', $nilai->id_kelas)->get();
        // dd($siswa);
        $join = DB::table('nilai')
            ->join('siswa', 'nilai.id_siswa', '=', 'siswa.id_siswa')->where('id_datanilai', $id)->get();
        // dd($join);
        return view('guru.nilai.view', [
            'data' => $data,
            'siswa' => $siswa,
            'join' => $join,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = DB::table('nilai')
            ->where('nilai.id_nilai', $id)->first();
        // dd($nilai);

        DB::table('nilai')->where('id_nilai', $id)->delete();


        return redirect()->route('guru-nilai.edit', $nilai->id_datanilai)->with('create', 'Data Berhasil Dihapus!!');
    }
}
