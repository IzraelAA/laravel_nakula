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
                <li class="breadcrumb-item active">Absensi</li>
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
            <div class="col-lg-10 col-md-7">
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
                      <div class="ml-auto">
                       <form action="{{route('filter')}}" method="post">
                               @csrf
                               <div class="row">
                                    <div class="col-9">
                                      <select class="form-control" name="id_kelas" id="id_kelas">
                                          <option value="">pilih kelas siswa</option>
                                          @foreach ($kelas as $kela)
                                          
                                          <option value="{{$kela->id_kelas}}">{{$kela->nama_kelas}} </option>
                                          @endforeach
                                      </select>
                                    </div>
                                    <div class="col-2">
                                      <button type="submit" class="btn btn-success">Pilih</button>
                                    </div>
                                  </div>
                             </form>
                      </div>
                  </div> <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col"> Siswa</th>
                                  <th scope="col"> Guru</th>
                                  <th scope="col">Kelas</th>
                                  <th scope="col"> Pelajaran</th>
                                  <th scope="col">Masuk</th>
                                  <th scope="col">Longtitude</th>
                                </tr>
                              </thead>
                              <tbody>             
                                <?php $i=1 ;?>
                                @foreach ($absen as $data)
                            <tr>
                              <td><?= $i ?></td>
                            <td>{{$data->nama_siswa}}</td>
                            <td>{{$data->nama_guru}}</td>
                            <td>{{$data->nama_kelas}}</td>
                            <td>{{$data->nama_pelajaran}}</td>
                            <td>{{$data->masuk}}</td>
                            <td>{{$data->longtitude}}</td>
                              
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