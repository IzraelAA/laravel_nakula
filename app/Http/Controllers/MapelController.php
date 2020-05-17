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
    public function index()
    {
        //
    }

    public function mapel()
    {
        $admin = DB::table('mata_pelajaran')->get();
    }




    public function tambahmapel(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'id_guru' => 'required'
        ]);

        DB::table('mata_pelajaran')->insert([
            'name' => request('name'),
            'id_guru' => request('id_guru')
        ]);
    }

    public function tambahmapelview(Request $request)
    {
        // $data['nama'] = $request->session()->get('id_sekolah');

        // $mapel = DB::table('guru')->where('id_sekolah', $data['nama'])->get();
        // var_dump($mapel);
        // die;
        $mapel = DB::table('guru')->get();

        return view('superadmin.mapel.mapel', ['mapel' => $mapel]);
    }




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
        DB::table('mata_pelajaran')->insert([
            'name' => request('name'),
            'id_guru' => request('id_guru'),
        ]);

        return redirect()->route('mata_pelajaran')->with('create', 'Data Berhasil Ditambah!!');
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
