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
                <li class="breadcrumb-item active">Raport</li>
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
                <div class="ml-auto">
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Raport</a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th scope="col">No</th> 
                            <th scope="col" class="text-center"> Siswa</th>   
                            <th scope="col" class="text-center"> Kelas</th>    
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>             
                        <?php $i=1 ;?>
                        @foreach ($data as $qui)
                        <tr class="text-center">
                          <td><?= $i ?></td>
                          <td>{{$qui->nama_siswa}}</td>
                        <td>{{$qui->nama_kelas}}</td>  
                        <td>
                          <a href="{{ route('raport.edit', $qui->id_datarapot) }}" class="btn btn-success">Lihat Nilai Raport</a>
                           <form action="{{ route('quiz.destroy', $qui->id_datarapot) }}" method="POST" class="d-inline">
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
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('raport.store')}}" method="post">
              @csrf
                   <div class="row">
                     <div class="col">
                         <label for="name">Nama Siswa</label> 
                       <select name="id_siswa" class="form-control" id="id_siswa">
                        @foreach ($siswa2 as $item)
                    <option value="{{$item->id_siswa}}">{{$item->nama_siswa}}</option>
                            
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