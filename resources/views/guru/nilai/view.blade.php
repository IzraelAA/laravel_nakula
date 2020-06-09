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
                <li class="breadcrumb-item active">Data Nilai</li>
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
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="background: linear-gradient(to right,#000046, #1cb5e0);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Nilai</a>
  
                      </div>
                  </div> <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Siswa</th>
                                  <th scope="col">Nilai</th>
                                  <th scope="col" class="text-center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>             
                               <?php $i=1 ?>
                               @foreach ($join as $item)
                               <tr>
                                 <td><?= $i; ?></td>
                                  <td>{{$item->nama_siswa}}</td>
                                 <td>{{$item->nilai}}</td>
                                 <td>
                                <form action="{{ route('guru-nilai.destroy', $item->id_nilai) }}" method="POST" class="d-inline">
                                                      @csrf
                                                      @method('delete')
              
                                                      <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus??');"> Hapus</button>
                                                  </form> 
                                </td>
                               </tr>
                                <?php $i++ ?>
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


  
 <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('tambah-nilai')}}" method="POST">
          @csrf
          
        <div class="row">
          <div class="col">
            <label for="">Nama Siswa</label>
          <input type="hidden" name="id_datanilai" id="id_datanilai" value="{{$data}}">
          {{-- <input type="hidden" value="{{$data[0]->id_kelas}}"> --}}
            <select name="id_siswa" id="id_siswa" class="form-control">
             @foreach ($siswa as $item)
            <option value="{{$item->id_siswa}}">{{$item->nama_siswa}}</option>
             @endforeach
            </select>
          </div>
        </div>
         <div class="row">
          <div class="col">
            <label for="">Nilai</label>
            <select name="nilai" id="nilai" class="form-control">
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="30">30</option>
              <option value="40">40</option>
              <option value="50">50</option>
              <option value="60">60</option>
              <option value="70">70</option>
              <option value="80">80</option>
              <option value="90">90</option>
              <option value="100">100</option>
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
</div>

@endsection