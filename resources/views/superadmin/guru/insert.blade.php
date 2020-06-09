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
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">

                    <form action="{{route('admin.store')}}" method="post">
                            @csrf           
                                <div class="row">
                                  <div class="col">
                                      <label for="nama">Nama Guru</label>
                                  <input type="hidden" name="id_sekolah" value="{{ $data['id'] }}">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama">
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="nik">Nik</label>
                                        <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan Nik">
                                   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="password">Password</label>
                                      <input type="password" class="form-control" id="password" name="password" required placeholder="Masukan Password">
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