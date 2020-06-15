<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kelasController extends Controller
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
            // var_dump($data);
            $kelas = DB::table('kelas')->where('id_sekolah', $data['id'])->get();
            return view('superadmin.kelas.index', ['data' => $kelas, 'kelas' => $data]);
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        DB::table('kelas')->insert([
            'id_sekolah' => request('id_sekolah'),
            'nama_kelas' => request('name'),
        ]);

        return redirect()->route('kelas.index')->with('create', 'Kelas Berhasil Ditambah!!');
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
        $kelas = DB::table('kelas')->where('id_kelas', $id)->get();
        // dd($kelas);
        return view('superadmin.kelas.update', ['kelas' => $kelas]);
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
        DB::table('kelas')
            ->where('id_kelas', $id)
            ->update(['id_sekolah' => $request->id_sekolah, 'nama_kelas' => $request->name]);

        return redirect()->route('kelas.index')->with('create', 'Data Berhasil Diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kelas')->where('id_kelas', $id)->delete();

        return redirect()->route('kelas.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
