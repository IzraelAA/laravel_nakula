<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = DB::table('admin')->join('sekolah', 'admin.id_sekolah', '=', 'sekolah.id_sekolah')->get();
        // dd($admin);
        $sekolah = DB::table('sekolah')->get();
        return view('superadmin.admin.index', [
            'admin' => $admin,
            'sekolah' => $sekolah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = DB::table('sekolah')->get();
        return view('superadmin.admin.insert', ['admin' => $admin]);
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
            'password' => 'required',
            'level' => 'required',
            'id_sekolah' => 'required'
        ]);
        DB::table('admin')->insert([
            'name' => request('name'),
            'password' => request('password'),
            'level' => request('level'),
            'id_sekolah' => request('id_sekolah')
        ]);

        return redirect()->route('superadmin.index')->with('create', 'Data Berhasil Ditambah!!');
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
        $admin = DB::table('admin')->join('sekolah', 'admin.id_sekolah', '=', 'sekolah.id_sekolah')->where('id', $id)->get();
        // var_dump($admin); die;
        return view('superadmin.admin.update', ['admin' => $admin]);
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
        DB::table('admin')
            ->where('id', $id)
            ->update(['name' => $request->name, 'password' => $request->password]);

        return redirect()->route('superadmin.index')->with('create', 'Data Berhasil Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('admin')->where('id', $id)->delete();

        return redirect()->route('superadmin.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
