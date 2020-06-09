<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['id'] = $request->session()->get('id_sekolah');
        $join = DB::table('mata_pelajaran')
            ->join('guru', 'mata_pelajaran.id_guru', '=', 'guru.id_guru')
            ->where('guru.id_sekolah', $data['id'])->get();
        $view = DB::table('materi')
            ->join('kelas', 'materi.id_kelas', '=', 'kelas.id_kelas')
            ->join('guru', 'materi.id_guru', '=', 'guru.id_guru')
            ->join('mata_pelajaran', 'materi.id_mapel', '=', 'mata_pelajaran.id_mapel')
            ->where('guru.id_sekolah', $data['id'])->get();
        // dd($view);
        // $materi = DB::table('guru')->where('id_sekolah', $data['id'])->get();
        return view('superadmin.materi.index', [
            'view' => $view,
            'data' => $data,
            'join' => $join
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
        $jadwal = DB::table('mata_pelajaran')->where('id_mapel', request('id_kelas'))->get();
        // dd($jadwal);
        $array = json_decode(json_encode($jadwal), true);
        $datajadwal = $array['0'];
        $data = $request->file('file');


        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/materi';

        // upload file
        $data->move($tujuan_upload, $data->getClientOriginalName());
        DB::table('materi')->insert([
            'id_kelas' => $datajadwal['id_kelas'],
            'id_guru' => $datajadwal['id_guru'],
            'id_sekolah' => request('id_sekolah'),
            'nama_materi' => request('nama_materi'),
            'file' => $data->getClientOriginalName(),
            'keterangan' => request('keterangan'),
            'id_mapel' => $datajadwal['id_mapel'],

        ]);

        return redirect()->route('materi.index')->with('create', 'Materi Berhasil Ditambah!!');
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
        DB::table('materi')->where('id_materi', $id)->delete();

        return redirect()->route('materi.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
