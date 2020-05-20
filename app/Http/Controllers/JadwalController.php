<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['id'] = $request->session()->get('id_sekolah');
        // $guru['id'] = $request->session()->get('id_guru');
        $kelas = DB::table('kelas')->where('id_sekolah', $data['id'])->get();
        $guru = DB::table('guru')->where('id_sekolah', $data['id'])->get();
        $mapel = DB::table('mata_pelajaran')
            ->join('guru', 'mata_pelajaran.id_guru', '=', 'guru.id_guru')
            ->where('guru.id_sekolah', $data['id'])
            ->get();
        // dd($data);
        $relasi = DB::table('jadwal_pelajaran')
            ->join('kelas', 'jadwal_pelajaran.id_kelas', '=', 'kelas.id_kelas')
            ->join('sekolah', 'jadwal_pelajaran.id_sekolah', '=', 'sekolah.id_sekolah')
            ->join('mata_pelajaran', 'jadwal_pelajaran.id_mapel', '=', 'mata_pelajaran.id_mapel')
            ->join('guru', 'jadwal_pelajaran.id_guru', '=', 'guru.id_guru')
            ->where('sekolah.id_sekolah', $data['id'])
            ->get();
        // dd($relasi);
        return view('superadmin.jadwal_pelajaran.index', ['data' => $data, 'relasi' => $relasi, 'kelas' => $kelas, 'guru' => $guru, 'mapel' => $mapel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        DB::table('jadwal_pelajaran')->insert([

            'id_kelas' => request('kelas'),
            'id_sekolah' => request('id_sekolah'),
            'id_mapel' => request('nama_pelajaran'),
            'id_guru' => request('guru'),
            'hari' => request('hari'),
            'masuk' => request('masuk'),
            'keluar' => request('keluar'),
        ]);

        return redirect()->route('jadwal.index')->with('create', 'Jadwal Berhasil Ditambah!!');
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
    public function edit(Request $request, $id)
    {
        $data['id'] = $request->session()->get('id_sekolah');
        $jadwal = DB::table('jadwal_pelajaran')->where('id_jadwal', $id)->get();
        $kelas = DB::table('kelas')->where('id_sekolah', $data['id'])->get();
        $guru = DB::table('guru')->where('id_sekolah', $data['id'])->get();
        // dd($guru);
        $mapel = DB::table('mata_pelajaran')
            ->join('guru', 'mata_pelajaran.id_guru', '=', 'guru.id_guru')
            ->where('guru.id_sekolah', $data['id'])->get();

        $relasi = DB::table('jadwal_pelajaran')
            ->join('kelas', 'jadwal_pelajaran.id_kelas', '=', 'kelas.id_kelas')
            ->join('sekolah', 'jadwal_pelajaran.id_sekolah', '=', 'sekolah.id_sekolah')
            ->join('mata_pelajaran', 'jadwal_pelajaran.id_mapel', '=', 'mata_pelajaran.id_mapel')
            ->join('guru', 'jadwal_pelajaran.id_guru', '=', 'guru.id_guru')
            ->where('sekolah.id_sekolah', $data['id'])
            ->get();
        // dd($mapel);
        return view('superadmin.jadwal_pelajaran.update', ['mapel' => $mapel, 'kelas' => $kelas, 'relasi' => $relasi, 'data' => $data, 'jadwal' => $jadwal, 'guru' => $guru]);
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
        DB::table('jadwal_pelajaran')
            ->where('id_jadwal', $id)
            ->update(['id_kelas' => $request->kelas, 'id_sekolah' => $request->id_sekolah, 'id_mapel' => $request->nama_pelajaran, 'id_guru' => $request->guru, 'hari' => $request->hari, 'masuk' => $request->masuk, 'keluar' => $request->keluar]);

        return redirect()->route('jadwal.index')->with('create', 'Data Berhasil Diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jadwal_pelajaran')->where('id_jadwal', $id)->delete();

        return redirect()->route('jadwal.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
