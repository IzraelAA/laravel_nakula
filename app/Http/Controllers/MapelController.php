<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
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

            $data['id'] = $request->session()->get('id_sekolah');
            $mapel = DB::table('nama_mapel')->where('id_sekolah', $data['id'])->get();
            $guru = DB::table('guru')->where('guru.id_sekolah', $data['id'])->get();
            $kelas = DB::table('kelas')->where('kelas.id_sekolah', $data['id'])->get();
            // dd($data['id']);
            $relasi = DB::table('mata_pelajaran')
                ->join('guru', 'mata_pelajaran.id_guru', '=', 'guru.id_guru')
                ->join('kelas', 'mata_pelajaran.id_kelas', '=', 'kelas.id_kelas')
                ->where('kelas.id_sekolah', $data['id'])
                ->get();

            // dd($relasi);
            // die;

            return view('superadmin.mapel.index', [
                'data' => $relasi,
                'mapel' => $mapel,
                'guru' => $guru,
                'kelas' => $kelas
            ]);
        }
    }

    public function mapel()
    {
        // $admin = DB::table('mata_pelajaran')->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['id'] = $request->session()->get('id_sekolah');

        $mapel = DB::table('guru')->where('id_sekolah', $data['id'])->get();
        $kelas = DB::table('kelas')->where('id_sekolah', $data['id'])->get();
        // var_dump($mapel);
        // die;
        // $mapel = DB::table('guru')->get();

        return view('superadmin.mapel.insert', ['mapel' => $mapel, 'kelas' => $kelas]);
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

        ]);
        DB::table('mata_pelajaran')->insert([
            'nama_pelajaran' => request('name'),
            'deskripsi' => request('deskripsi'),
            'id_guru' => request('id_guru'),
            'id_kelas' => request('id_kelas'),
        ]);

        return redirect()->route('mapel.index')->with('create', 'Data Berhasil Ditambah!!');
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
        $guru = DB::table('guru')->where('id_sekolah', $data['id'])->get();
        $kelas = DB::table('kelas')->where('id_sekolah', $data['id'])->get();

        $mapel = DB::table('mata_pelajaran')
            ->where('id_mapel', $id)->get();
        // dd($kelas);
        return view('superadmin.mapel.update', [
            'mapel' => $mapel,
            'guru' => $guru,
            'kelas' => $kelas
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
    {
        DB::table('mata_pelajaran')
            ->where('id_mapel', $id)
            ->update([
                'nama_pelajaran' => $request->name,
                'id_guru' => $request->mapel,
                'id_kelas' => $request->kelas,
            ]);

        return redirect()->route('mapel.index')->with('create', 'Data Berhasil Diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('mata_pelajaran')->where('id_mapel', $id)->delete();

        return redirect()->route('mapel.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
