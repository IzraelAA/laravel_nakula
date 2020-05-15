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
    public function sekolah(Request $request)
    { 
        $data['logo'] = $request->session()->get('logo1');
        $data['nama'] = $request->session()->get('nama_sekolah');
        $data['name'] = $request->session()->get('name');
        print_r($data);
        // return view ('superadmin.sekolah',['data' => $data]);
    }

    public function dashboard()
    {
        return view('superadmin.dashboard');
    }

    public function admin()
    {
        $admin = DB::table('admin')->join('sekolah', 'admin.id_sekolah', '=', 'sekolah.id_sekolah')->get();
        return view('superadmin.adminsekolah', ['admin' => $admin]);
    }
    public function tambahadmin(Request $request){

        $this->validate($request,[
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
        
    return redirect()->route('tambahadminlihat');
    }
    
    public function tambahadminlihat()
    {
        $admin = DB::table('sekolah')->get();
        return view('superadmin.tambahsekolah', ['admin' => $admin]);
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
                    $admin = DB::table('admin')->join('sekolah', 'admin.id_sekolah', '=', 'sekolah.id_sekolah')->where(
                        'name','=',request('name')
                    )->get();
                    $name="";
                    $name_sekolah="";
                    $id_sekolah="";
                    $id="";
                    foreach ($admin as $key => $value) {
                        $name=$value->name;
                        $name_sekolah=$value->nama_sekolah;
                        $id_sekolah = $value->id_sekolah;
                        $id = $value->id;
                        $logo = $value->logo;
                    }
                                
                    $request->session()->put('name',$name);
                    $request->session()->put('nama_sekolah',$name_sekolah);
                    $request->session()->put('id_sekolah',$id_sekolah);
                    $request->session()->put('id',$id);
                    $request->session()->put('logo1',$logo);

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
