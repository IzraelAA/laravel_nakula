<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NakulaController extends Controller
{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.admin.dashboard');
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

    public function login()
    {
        return view('login');
    }

    public function loginadmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);
        $tb_login = DB::table('admin')->where(
            'name',
            '=',
            request('name')
        )->where(
            'password',
            '=',
            request('password')
        )->count();

        $guru = DB::table('guru')->where(
            'nik',
            '=',
            request('name'),
        )->where(
            'password',
            '=',
            request('password')
        )->count();

        if ($tb_login == 1) {
            $tb_acc = DB::table('admin')->where(
                'name',
                '=',
                request('name')
            )->where(
                'level',
                '=',
                "superadmin"
            )->count();
            if ($tb_acc == 1) {

                return redirect()->route('nakula.index');
            } else {
                $admin = DB::table('admin')->join('sekolah', 'admin.id_sekolah', '=', 'sekolah.id_sekolah')->where(
                    'name',
                    '=',
                    request('name')
                )->get();
                $name = "";
                $name_sekolah = "";
                $id_sekolah = "";
                $id = "";
                foreach ($admin as  $value) {
                    $name = $value->name;
                    $name_sekolah = $value->nama_sekolah;
                    $id_sekolah = $value->id_sekolah;
                    $id = $value->id;
                    $logo = $value->logo;
                }

                $request->session()->put('name', $name);
                $request->session()->put('nama_sekolah', $name_sekolah);
                $request->session()->put('id_sekolah', $id_sekolah);
                $request->session()->put('id', $id);
                $request->session()->put('logo1', $logo);

                return redirect()->route('dashboard');
            }
        } else if ($guru == 1) {
            $admin1 = DB::table('guru')
                ->join('sekolah', 'guru.id_sekolah', '=', 'sekolah.id_sekolah')
                // ->join('mata_pelajaran','guru')
                ->where(
                    'nik',
                    '=',
                    request('name')
                )->get();

            $name = "";
            $name_sekolah = "";
            $id_sekolah = "";
            $id_guru = "";
            // dd($admin1);
            foreach ($admin1 as  $value) {
                $name = $value->nama_guru;
                $name_sekolah = $value->nama_sekolah;
                $id_sekolah = $value->id_sekolah;
                $id_guru = $value->id_guru;
                $logo = $value->logo;
            }

            $request->session()->put('name', $name);
            $request->session()->put('nama_sekolah', $name_sekolah);
            $request->session()->put('id_sekolah', $id_sekolah);
            $request->session()->put('id_guru', $id_guru);
            $request->session()->put('logo1', $logo);

            return redirect()->route('guru.index');
        } else {
            return redirect()->route('login')->with('create', 'Gagal Login!!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('testsoal')->insert([
            'id_datasoal' => request('id_datasoal'),
            'bobot' => request('bobot'),
            'soal' => request('soal'),
            'jawaban' => request('jawaban'),
            'opsi_a' => request('opsi_a'),
            'opsi_b' => request('opsi_b'),
            'opsi_c' => request('opsi_c'),
            'opsi_d' => request('opsi_d'),
            'opsi_e' => request('opsi_e'),

        ]);
        return redirect()->route('soal-ganda.edit', request('id_datasoal'))->with('create', ' Berhasil Ditambah!!');
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
