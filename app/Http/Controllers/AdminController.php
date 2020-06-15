<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Exports\GuruExport;
use App\Imports\GuruImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
            $mapel = DB::table('guru')->where('id_sekolah', $data['id'])->get();
            // var_dump($mapel);

            return view('superadmin.guru.index', ['data' => $mapel]);
        }
    }

    public function dashboard()
    {
        return view('superadmin.guru.dashboard');
    }

    public function export_excel()
    {
        return Excel::download(new GuruExport, 'guru.xlsx');
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $tujuan_upload = 'assets/guru' . $nama_file;

        $file->move($tujuan_upload, $file->getClientOriginalName());

        // import data
        Excel::import(new GuruImport, $file->getClientOriginalName());

        return redirect()->route('admin.index')->with('create', 'Guru Berhasil Ditambah!!');
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
            'nama_guru' => request('name'),
            'nik' => request('nik'),
            'password' => request('password'),
        ]);

        return redirect()->route('admin.index')->with('create', 'Guru Berhasil Ditambah!!');
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
        // $data['id'] = $request->session()->get('id_sekolah');
        $guru = DB::table('guru')->where('id_guru', $id)->get();
        // dd($guru);

        return view('superadmin.admin.update', ['guru' => $guru]);
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
        DB::table('guru')
            ->where('id_guru', $id)
            ->update(['id_sekolah' => $request->id_sekolah, 'nama_guru' => $request->name, 'nik' => $request->nik, 'password' => $request->password]);

        return redirect()->route('admin.index')->with('create', 'Data Berhasil Diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('guru')->where('id_guru', $id)->delete();

        return redirect()->route('admin.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
