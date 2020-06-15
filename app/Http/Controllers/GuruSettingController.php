<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GuruSettingController extends Controller
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
            $id['id'] = $request->session()->get('id_guru');
            $id_sekolah['id'] = $request->session()->get('id_sekolah');
            // dd($data);
            $data = DB::table('guru')->where('id_guru', $id['id'])->get();
            // dd($data);
            return view('guru.setting.index', [
                'data' => $data,
                'id_sekolah' => $id_sekolah
            ]);
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
        // return view('guru.setting.update');
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

        $file = $request->file('picture');

        // print_r($file);


        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/foto_siswa';

        // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());
        DB::table('guru')
            ->where('id_guru', $id)
            ->update([
                'id_sekolah' => $request->id_sekolah,
                'nama_guru' => $request->nama,
                'email' => $request->email,
                'nik' => $request->nik,
                'no_telphone' => $request->no_telp,
                'alamat' => $request->alamat,
                'hoby' => $request->hoby,
                'agama' => $request->agama,
                'jenis_kelamin' => $request->jenis,
                'picture' => $file->getClientOriginalName(),
                'password' => $request->password
            ]);

        return redirect()->route('guru-setting.index')->with('create', 'Data Berhasil Diupdate!!');
    }
    // public function editprofile(Request $request)
    // {

    //     $file = $request->file('picture');

    //     print_r($file->getClientOriginalName());


    //     // isi dengan nama folder tempat kemana file diupload
    //     $tujuan_upload = 'assets/logo';

    //     // upload file
    //     // $file->move($tujuan_upload, $file->getClientOriginalName());
    //     // DB::table('guru')
    //     //     ->where('id_guru', $id)
    //     //     ->update([
    //     //         'id_sekolah' => $request->id_sekolah,
    //     //         'nama_guru' => $request->nama,
    //     //         'email' => $request->email,
    //     //         'nik' => $request->nik,
    //     //         'no_telphone' => $request->no_telp,
    //     //         'alamat' => $request->alamat,
    //     //         'hoby' => $request->hoby,
    //     //         'agama' => $request->agama,
    //     //         'jenis_kelamin' => $request->jenis,
    //     //         'picture' => $file->getClientOriginalName(),
    //     //         'password' => $request->password
    //     //     ]);

    //     // return redirect()->route('guru-setting.index')->with('create', 'Data Berhasil Diupdate!!');
    // }

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
