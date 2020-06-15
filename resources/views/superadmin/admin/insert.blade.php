@extends('superadmin.dashboard')

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
                <li class="breadcrumb-item active">Admin</li>
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

                    <form action="{{route('admin.store')}}" method="post">
                            @csrf           
                                <div class="row">
                                  <div class="col">
                                      <label for="nama">Nama Admin</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama">
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="level">Level</label>
                                    <select class="form-control" name="level" id="level">
                                        <option>Pilih Level</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="password">Password</label>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="id_sekolah">Nama Sekolah</label>
                            
                                        <select name="id_sekolah" class="form-control" id="id_sekolah">
                                          @foreach ($admin as $data)
                                          <option value={{$data->id_sekolah}}>{{$data->nama_sekolah}}</option>
                                          {{print_r($data)}}
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                              
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
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


  

<!-- 
@endsection