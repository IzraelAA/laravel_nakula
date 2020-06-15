@extends('superadmin.home_dashboardguru')

@section('content')
    
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Setting</li>
            </ol>
        </div>
        {{-- <div class="col-md-6 col-4 align-self-center">
            <a href="https://wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down btn-success"> Upgrade to Pro</a>
        </div> --}}
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="container">
        <div class="row justify-content-center">
            <!-- Column -->
            
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-12 col-md-8">
                
                        
            @if (session('create'))
            <div class="alert alert-primary text-center">
                {{ session('create') }}
    
            </div>
           @endif
          <div class="container"> 
            <div class="row">  
                <div class="col-md-4 ">      
                    <div class="portlet light profile-sidebar-portlet bordered">
                        <div class="profile-userpic text-center">
                            <img src="{{url('assets/foto_siswa/'. $data[0]->picture)}}" class="img-responsive" alt=""> </div>
                        <div class="profile-usertitle mb-4">
                            <div class="profile-usertitle-name"> {{$data[0]->nama_guru}} </div>
                            <div class="profile-usertitle-job"> Guru </div>
                        </div>
                        {{-- <div class="profile-userbuttons">
                            <button type="button" class="btn btn-info  btn-sm">Follow</button>
                            <button type="button" class="btn btn-info  btn-sm">Message</button>
                        </div> --}}
                       
                    </div>
                </div>
                <div class="col-md-8"> 
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Your info</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div>
                            
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                    <form action="{{route('guru-setting.update', $data[0]->id_guru)}}" method="POST" enctype="multipart/form-data">
                                      @method('PUT')
                                          @csrf
                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-6">
                                                <label for="nama">Name</label>
                                                <input type="hidden" name="id_sekolah" id="id_sekolah" value="{{$id_sekolah['id']}}">
                                                <input type="text" class="form-control" name="nama" id="nama" value="{{$data[0]->nama_guru}}">
                                         
                                              </div>
                                              <div class="col-6">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" value="{{$data[0]->email}}">
                                      
                                              </div>
                                            </div>
                                         </div>
                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-6">
                                                    <label for="nik">Nik</label>
                                                    <input type="text" class="form-control" name="nik" id="nik" value="{{$data[0]->nik}}">
                                          
                                              </div>
                                              <div class="col-6">
                                                <label for="nik">No Telphone</label>
                                                <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{$data[0]->no_telphone}}">
                                              </div>
                                            </div>
                                         </div>
 
                                           <div class="form-group">
                                             <div class="row">
                                               <div class="col-6">
                                                  <label for="alamat">Alamat</label>
                                                  <input type="text" class="form-control" name="alamat" id="alamat" value="{{$data[0]->alamat}}">
                                               </div>
                                               <div class="col-6">
                                                  <label for="hoby">Hoby</label>
                                                  <input type="text" class="form-control" name="hoby" id="hoby" value="{{$data[0]->hoby}}">
                                               </div>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <div class="row">
                                               <div class="col-6">
                                                  <label for="agama">Agama</label>
                                                  <select name="agama" id="agama" class="form-control">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Hindu">Hindu</option>
                                                  </select>
                                                  
                                               </div>
                                               <div class="col-6">
                                                  <label for="jenis_kelamin">Jenis Kelamin</label>
                                                  <select name="jenis" class="form-control" id="jenis">
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                  </select>
                                               </div>
                                             </div>
                                         </div>
                                          <div class="form-group">
                                            <label for="picture">Picture</label>
                                          <input type="file" class="form-control-file" id="picture" name="picture" >
                                          </div>
                                          <div class="form-group">
                                            <label for="password">Password</label>
                                          <input type="password" class="form-control" name="password" id="password" value="{{$data[0]->password}}">
                                          </div>
                                         
                                          <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                   
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
           
                    
        
            </div>
            <!-- Column -->
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>


  


@endsection