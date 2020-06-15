<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GuruMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->get('id_sekolah') == "") {
            return redirect()->route('login');
        } else {
            $data['id'] = $request->session()->get('id_guru');
            $relasi = DB::table('jadwal_pelajaran')
                ->join('kelas', 'jadwal_pelajaran.id_kelas', '=', 'kelas.id_kelas')
                ->join('mata_pelajaran', 'jadwal_pelajaran.id_mapel', '=', 'mata_pelajaran.id_mapel')
                ->join('guru', 'jadwal_pelajaran.id_guru', '=', 'guru.id_guru')
                ->where('guru.id_guru', $data['id'])->get();
            $materi = DB::table('materi')
                ->join('kelas', 'materi.id_kelas', '=', 'kelas.id_kelas')
                ->join('mata_pelajaran', 'materi.id_mapel', '=', 'mata_pelajaran.id_mapel')
                ->join('guru', 'materi.id_guru', '=', 'guru.id_guru')
                ->where('mata_pelajaran.id_guru', $data['id'])->get();
            // dd($relasi);
            return view('guru.materi.index', [
                'data' => $data,
                'relasi' => $relasi,
                'materi' => $materi

            ]);
        }
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
        $jadwal = DB::table('jadwal_pelajaran')->where('id_mapel', request('id_kelas'))->get();
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

        return redirect()->route('guru-materi.index')->with('create', 'Materi Berhasil Ditambah!!');
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

        return redirect()->route('guru-materi.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
