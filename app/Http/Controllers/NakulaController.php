<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NakulaController extends Controller
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
    public function sekolah()
    {
        return view ('superadmin.sekolah');
    }

    public function dashboard()
    {
        return view('superadmin.dashboard');
    }

    public function admin()
    {

        $admin = DB::table('admin')->get();
        
        return view('superadmin.adminsekolah', ['admin' => $admin]);
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

    public function loginadmin(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'password' => 'required',
        ]);
        $tb_login = DB::table('admin')->where(
            'name','=',request('name'))->where(
                'password','=',request('password')
            )->count();
            if($tb_login==1){
                $tb_acc = DB::table('admin')->where(
                    'name','=',request('name')
                )->where(
                    'level','=',"superadmin"
                )->count(); 
                if($tb_acc ==1){ 
                    
                    return redirect()->route('dashboard');
                }else{ 
                    return redirect()->route('sekolah');
                };
            }else{ 
                return view("login");
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
        //
    }
    public function uploadsekolah(Request $request)
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

return redirect()->route('dashboard');
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
