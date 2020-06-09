<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalGandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['id'] = $request->session()->get('id_sekolah');
        $soal = DB::table('data_soal')
            ->join('mata_pelajaran', 'data_soal.id_mapel', '=', 'mata_pelajaran.id_mapel')
            ->join('guru', 'data_soal.id_guru', '=', 'guru.id_guru')
            ->where('guru.id_sekolah', $data['id'])->get();
        $relasi = DB::table('mata_pelajaran')
            ->join('guru', 'mata_pelajaran.id_guru', '=', 'guru.id_guru')
            ->where('guru.id_sekolah', $data['id'])
            ->get();


        // dd($soal);
        return view(
            'superadmin.soal_ganda.index',
            [
                'data' => $data,
                'relasi' => $relasi,
                'soal' => $soal
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $data['id'] = $request->session()->get('id_sekolah');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = DB::table('mata_pelajaran')->where('id_mapel', request('id_mapel'))->get();
        $array = json_decode(json_encode($mapel), true);
        $datamapel = $array['0'];

        DB::table('data_soal')->insert([
            'nama_soal' => request('nama_soal'),
            'id_mapel' => request('id_mapel'),
            'id_sekolah' => request('id_sekolah'),
            'id_guru' => $datamapel['id_guru'],
            'id_kelas' => $datamapel['id_kelas'],

        ]);
        return redirect()->route('soal-ganda.index')->with('create', ' Berhasil Ditambah!!');
    }

    // public function tambah(Request $request)
    // {

    //     DB::table('testsoal')->insert([
    //         'id_datasoal' => request('id_datasoal'),
    //         'bobot' => request('bobot'),
    //         'soal' => request('soal'),
    //         'jawaban' => request('jawaban'),
    //         'opsi_a' => request('opsi_a'),
    //         'opsi_b' => request('opsi_b'),
    //         'opsi_c' => request('opsi_c'),
    //         'opsi_d' => request('opsi_d'),
    //         'opsi_e' => request('opsi_e'),

    //     ]);
    //     return redirect()->route('soalganda.edit')->with('create', ' Berhasil Ditambah!!');
    // }

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
        $data = DB::table('testsoal')->where('id_datasoal', $id)->get();

        $relasi = DB::table('data_soal')
            ->join('mata_pelajaran', 'data_soal.id_mapel', '=', 'mata_pelajaran.id_mapel')
            ->join('guru', 'data_soal.id_guru', '=', 'guru.id_guru')
            ->where('id_datasoal', $id)->get();
        // dd($data);
        return view('superadmin.soal_ganda.insert', [
            // 'mapel' => $mapel,
            'relasi' => $relasi,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('data_soal')->where('id_datasoal', $id)->delete();
        return redirect()->route('soal-ganda.index')->with('create', ' Berhasil Dihapus!!');
    }
}
