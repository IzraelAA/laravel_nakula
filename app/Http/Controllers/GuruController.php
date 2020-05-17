<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = DB::table('guru')->get();

        $data['id'] = $request->session()->get('id_sekolah');
        $mapel = DB::table('guru')->where('id_sekolah', $data['id'])->get();
        // var_dump($mapel);

        return view('superadmin.guru.index', ['data' => $mapel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['id'] = $request->session()->get('id_sekolah');
        // $mapel = DB::table('guru')->where('id_sekolah', $data['id'])->get();
        // var_dump($mapel);
        return view('superadmin.guru.insert', ['data' => $data]);
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
            'nik' => 'required'
        ]);

        DB::table('guru')->insert([
            'id_sekolah' => request('id_sekolah'),
            'name' => request('name'),
            'nik' => request('nik'),
            'password' => request('password'),
        ]);

        return redirect()->route('guru.index')->with('create', 'Data Berhasil Ditambah!!');
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
        DB::table('guru')->where('id', $id)->delete();

        return redirect()->route('guru.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
