<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NamaMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('nama_mapel')->get();
        // dump($data);
        return view ('superadmin.nama_mapel.index',[
            'data' => $data
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
        $this->validate($request, [
            'name' => 'required',

        ]);
        DB::table('nama_mapel')->insert([
            'name_mapel' => request('name')
        ]);

        return redirect()->route('namamapel.index')->with('create', 'Data Berhasil Ditambah!!');
   
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
        $nama = DB::table('nama_mapel')->where('id_napel',$id)->get();
        // var_dump($admin);die;

        return view ('superadmin.nama_mapel.update',['nama' => $nama]);
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
        DB::table('nama_mapel')
        ->where('id_napel',$id)
        ->update([
            'name_mapel' => $request->nama_mapel
            ]);

        return redirect()->route('namamapel.index')->with('create', 'Data Berhasil Diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('nama_mapel')->where('id_napel', $id)->delete();

        return redirect()->route('namamapel.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
