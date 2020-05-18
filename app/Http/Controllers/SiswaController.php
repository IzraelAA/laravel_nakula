<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['id'] = $request->session()->get('id_sekolah');
        $kelas = DB::table('kelas')->where('id_sekolah', $data['id'])->get();
        $siswa = DB::table('siswa')->where('id_sekolah', $data['id'])->get();
        $relasi = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id')
            ->join('sekolah', 'siswa.id_sekolah', '=', 'sekolah.id_sekolah')
            ->where('sekolah.id_sekolah', $data['id'])
            ->get();
        // var_dump($relasi);

        return view('superadmin.siswa.index', ['data' => $siswa, 'kelas' => $kelas, 'relasi' => $relasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $siswa = DB::table('kelas')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'nis' => 'required',
            'password' => 'required'
        ]);

        DB::table('siswa')->insert([

            'id_sekolah' => request('id_sekolah'),
            'id_kelas' => request('id_kelas'),
            'nama_siswa' => request('name'),
            'nis' => request('nis'),
            'password' => request('password'),
        ]);

        return redirect()->route('siswa.index')->with('create', 'Siswa Berhasil Ditambah!!');
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
        DB::table('siswa')->where('id', $id)->delete();

        return redirect()->route('siswa.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
