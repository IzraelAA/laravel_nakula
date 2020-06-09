@extends('superadmin.home_dashboardguru')

@section('content')
    
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Soal</li>
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
                {{-- table --}}
                <div class="card mb-4">
                  <div class="card-header d-flex">
                    <div class="text-left">
                      <i class="fas fa-table mr-1"></i>DataTable Example
                    </div>
                      {{-- <div class="ml-auto">
                        <a href="#" class="btn btn-success" style="background: linear-gradient(to right,#000046, #1cb5e0);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Admin</a>
  
                      </div> --}}
                  </div> <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Soal</th>
                                  <th scope="col">A</th>
                                  <th scope="col">B</th>
                                  <th scope="col">C</th>
                                  <th scope="col">D</th>
                                  <th scope="col">E</th>
                                  <th scope="col">Jawaban</th>
                                  <th scope="col">Bobot</th>
                                  {{-- <th scope="col" class="text-center">Aksi</th> --}}
                                </tr>
                              </thead>
                              <tbody>             
                                <?php $i=1 ;?>
                                @foreach ($data as $item)
                            
                              <tr>
                              <th scope="row"><?=$i;?></th>
                                <td>{{$item->soal}}</td>
                                <td>{{$item->opsi_a}}</td>
                                <td>{{$item->opsi_b}}</td>
                                <td>{{$item->opsi_c}}</td>
                                <td>{{$item->opsi_d}}</td>
                                <td>{{$item->opsi_e}}</td>
                                <td>{{$item->jawaban}}</td>
                                <td>{{$item->bobot}}</td>
                                
                               
                                
                              </tr>
                              <?php $i++; ?>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
                {{-- end table --}}
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