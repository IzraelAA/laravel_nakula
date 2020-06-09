@extends('superadmin.dashboardadmin')

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
                <li class="breadcrumb-item ">Admin</li>
                <li class="breadcrumb-item active">Edit Pelajaran</li>
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
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('mapel.update',$mapel[0]->id_mapel)}}" method="post">
                            @method('PUT')
                            @csrf           
                                <div class="row">
                                  <div class="col">
                                      <label for="name">Nama Pelajaran</label>
                                  <input type="text" class="form-control" name="name" id="name" value="{{$mapel[0]->nama_pelajaran}}">
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="mapel">Nama guru</label>
                                        <select name="mapel" id="mapel" class="form-control">
                                        @foreach ($guru as $item)
                                    <option value="{{$item->id_guru}}">{{$item->nama_guru}}</option>
                                        @endforeach
                                    </select>
                                   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="id_kelas">Nama Kelas</label>
                                        <select name="kelas" id="kelas" class="form-control">
                                        @foreach ($kelas as $item)
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