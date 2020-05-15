<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('sekolah')->get();

        
        // print_r($data); die;
        return view ('superadmin.sekolah.index',['data' => $data]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['logo'] = $request->session()->get('logo1');
        $data['nama'] = $request->session()->get('nama_sekolah');
        $data['name'] = $request->session()->get('name');
        // print_r($data);
        return view ('superadmin.sekolah',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
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
        $admin = DB::table('sekolah')->where('id_sekolah',$id)->get();
        // var_dump($admin);die;

        return view ('superadmin.sekolah.update',['admin' => $admin]);
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
        DB::table('sekolah')
        ->where('id_sekolah',$id)
        ->update(['nama_sekolah' => $request->nama_sekolah]);

        return redirect()->route('sekolah.index')->with('create', 'Data Berhasil Diupdate!!');
        
    
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'logo' => 'required',
        ]);
        $file = $request->file('logo');
  

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/logo';

        // upload file
        $file->move($tujuan_upload,$file->getClientOriginalName());
        DB::table('sekolah')->insert([
            'nama_sekolah' => request('name'),
            'logo' => $file->getClientOriginalName()
        ]);

        return redirect()->route('sekolah.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('sekolah')->where('id_sekolah',$id)->delete();
        
        // return redirect()->route('sekolah.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
