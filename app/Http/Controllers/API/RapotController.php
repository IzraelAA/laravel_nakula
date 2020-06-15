<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RapotController extends Controller
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
        //
    }
    public function raport(Request $request)
    {
        $siswa = DB::table('data_raport')
        ->join('kelas', 'data_raport.id_kelas', '=', 'kelas.id_kelas')
        ->join('siswa', 'data_raport.id_siswa', '=', 'siswa.id_siswa')
        ->join('sekolah', 'data_raport.id_sekolah', '=', 'sekolah.id_sekolah')
        ->where('data_raport.id_siswa',$request->input('id_siswa'))->get(); 
        $_login = DB::table('data_raport')
        ->join('kelas', 'data_raport.id_kelas', '=', 'kelas.id_kelas')
        ->join('siswa', 'data_raport.id_siswa', '=', 'siswa.id_siswa')
        ->join('sekolah', 'data_raport.id_sekolah', '=', 'sekolah.id_sekolah')
        ->where('data_raport.id_siswa',$request->input('id_siswa'))->count(); 
        
        if ($_login > 1)
            return ResponseFormatter::success($siswa, 'Data Siswa Berhasil Login');
        else
            return ResponseFormatter::error(null, 'Data Siswa Tidak Ada'); 
    }
    public function detailraport(Request $request)
    {
        $_login = DB::table('nialiraport') 
        ->where('id_dataraport',$request->input('id_nialiraport'))->count();  
        if ($_login >= 1){
        $siswa = DB::table('nialiraport')
        ->join('mata_pelajaran','nialiraport.id_mapel','=','nialiraport.id_mapel')
        ->where('id_dataraport',$request->input('id_nialiraport'))->get(); 
            return ResponseFormatter::success($siswa, 'Data Siswa Berhasil Login');}
        else
            return ResponseFormatter::error(null, 'Data Siswa Tidak Ada'); 
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
