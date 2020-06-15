<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class RapotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['id'] = $request->session()->get('id_sekolah');
        $siswa1 = DB::table('siswa')
        ->where('id_sekolah', $data['id'])->get();  
        $siswa = DB::table('data_raport')
        ->join('kelas', 'data_raport.id_kelas', '=', 'kelas.id_kelas')
        ->join('siswa', 'data_raport.id_siswa', '=', 'siswa.id_siswa')
        ->join('sekolah', 'data_raport.id_sekolah', '=', 'sekolah.id_sekolah')
        ->where('sekolah.id_sekolah', $data['id'])->get(); 
        return view(
            'superadmin.raport.index',
            [
                'data' => $siswa,
                'siswa2' => $siswa1
            ]
        );
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
        $siswa = DB::table('siswa')->where('id_siswa',request('id_siswa'))->first();
        print_r($siswa);
        DB::table('data_raport')
        ->insert([ 
            'id_siswa' => $siswa->id_siswa,
        'id_kelas' => $siswa->id_kelas,
        'id_sekolah' => $siswa->id_sekolah
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $first = DB::table('data_raport')
        ->join('kelas', 'data_raport.id_kelas', '=', 'kelas.id_kelas')
        ->join('siswa', 'data_raport.id_siswa', '=', 'siswa.id_siswa')
        ->join('sekolah', 'data_raport.id_sekolah', '=', 'sekolah.id_sekolah')
        ->where('id_datarapot', $id)->first();   
        print_r ($first);	
        $get = DB::table('nialiraport') 
        ->where('id_dataraport', $id)->get();    
        $kelas = DB::table('mata_pelajaran')->where('id_kelas',$first->id_kelas)->get();
        // print_r($first);
          return view(
            'superadmin.raport.tambah', [
                'kelas' => $kelas,
                'first' => $first,
                'data_raport' => $get
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
    public function insert(Request $request)
    { 
        DB::table('nialiraport')->insert([
            'id_mapel' => request('id_dataquiz'),
            'id_dataraport' => request('iddata'),
        'tipe' => request('tipe'),
        'nilai' => request('nilai')
    ]);
    print_r("sukses");
    }
}
