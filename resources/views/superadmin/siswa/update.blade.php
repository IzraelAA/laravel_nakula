@extends('superadmin.dashboardguru')

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
                <li class="breadcrumb-item active">Guru</li>
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
            <div class="col-lg-10 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('siswa.update',$siswa[0]->id_siswa)}}" method="post">
                            @method('PUT')
                            @csrf           
                                <div class="row">
                                  <div class="col">
                                      <label for="nama">Nama Guru</label>
                                  <input type="hidden" name="id_sekolah" value="{{$siswa[0]->id_sekolah}}">
                                  <input type="text" class="form-control" name="name" id="name" value="{{$siswa[0]->nama_siswa}}">
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="nik">Nik</label>
                                    <input type="text" class="form-control" name="nis" id="nis" value="{{$siswa[0]->nis}}">
                                   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required value="{{$siswa[0]->password}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="name">kelas</label>
                                        <select name="id_kelas" class="form-control" id="id_kelas">
                                            @foreach ($join as $item)
                                        <option value="{{$item->id_kelas}}">{{$item->nama_kelas}}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                       
                    
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