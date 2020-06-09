<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PembayaranController extends Controller
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
        // dd($kelas);
        return view('superadmin.pembayaran.spp.index', [
            'kelas' => $kelas,
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
        DB::table('pembayaran')->insert([
            'id_kelas' => request('id_kelas'),
            'id_siswa' => request('id_siswa'),
            'tanggal_pembayaran' => request('tanggal_pembayaran'),
            'bulan_pembayaran' => request('bulan_pembayaran'),
            'jumlah_pembayaran' => request('jumlah_pembayaran'),
        ]);
        return redirect()->route('pembayaran.edit', request('id_kelas'))->with('create', ' Berhasil Ditambah!!');
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
        $tes = $id;
        // dd($tes);
        $data = DB::table('siswa')->where('id_kelas', $id)->get();
        $bayar = DB::table('pembayaran')
            ->join('siswa', 'pembayaran.id_siswa', '=', 'siswa.id_siswa')->where('pembayaran.id_kelas', $id)->get();
        // dd($bayar);
        return view('superadmin.pembayaran.spp.insert', [
            'data' => $data,
            'tes' => $tes,
            'bayar' => $bayar
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
        $firs = DB::table('pembayaran')
            ->where('id_pembayaran', $id)
            ->first();
        DB::table('pembayaran')->where('id_pembayaran', $id)->delete();
        return redirect()->route('pembayaran.edit', $firs->id_kelas)->with('create', ' Berhasil Dihapus!!');
    }
}
