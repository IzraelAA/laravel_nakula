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
                <li class="breadcrumb-item active">Quiz</li>
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
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="background: linear-gradient(to right,#000046, #1cb5e0);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Quiz</a>
  
                      </div>
                  </div> <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama Quiz</th>
                                  <th scope="col">Pelajaran</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>       
                                <?php $i=1;?>
                                @foreach ($quiz as $kuy)
                                  <tr>
                                    <td><?= $i;?></td>
                                  <td>{{$kuy->nama_quiz}}</td>
                                  <td>{{$kuy->nama_pelajaran}}</td>
                                  <td>
                                    <a href="{{ route('guru-quiz.edit', $kuy->id_dataquiz) }}" class="btn btn-success">Lihat Quiz</a>
                                    <form action="{{ route('guru-quiz.destroy', $kuy->id_dataquiz) }}" method="POST" class="d-inline">
                                        @csrf
                                      @method('delete')
                    
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus??');"> Hapus</button>
                                  </form>
                                  </td>
                                  </tr>
                                <?php $i++?>    
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


  
 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Quiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('guru-quiz.store')}}" method="POST">
          @csrf
          <div class="row">
          <div class="col">
            <label for="">Nama Quiz</label>
          <input type="text" class="form-control" name="nama_quiz" id="nama_quiz" placeholder="Nama Quiz">
          </div>
        </div>
        
        <div class="row">
          <div class="col">
            <label for="">Mata Pelajaran</label>
          <input type="hidden"  name="id_sekolah" value="{{$data['id']}}">
            <select name="id_mapel" id="id_mapel" class="form-control">
             @foreach ($quiz as $item)
            <option value="{{$item->id_mapel}}">{{$item->nama_pelajaran}}</option>
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
</div>

@endsection