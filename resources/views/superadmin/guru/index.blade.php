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
          <div class="col-lg-12 col-md-8">
            
                      
          @if (session('create'))
          <div class="alert alert-primary text-center">
              {{ session('create') }}
  
          </div>
         @endif
                  {{-- <div class="action text-right">

                    <a href="{{route('guru.create')}}" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah Guru</a>
                    <a href="{{url('guru/export_excel')}}" class="btn btn-success" ><i class="fa fa-plus"></i> Export Guru</a>
                    <a href="#" data-toggle="modal" data-target="#ImportModal" class="btn btn-success" ><i class="fa fa-plus"></i> import Guru</a>
                  </div> --}}
                      {{-- table --}}
                      <div class="card mb-4">
                        <div class="card-header d-flex">
                          <div class="text-left">
                            <i class="fas fa-table mr-1"></i>DataTable Example
                          </div>
                            <div class="ml-auto">
                              <a href="{{route('admin.create')}}" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah Guru</a>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nik</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>             
                                      <?php $i=1 ;?>
                                      @foreach ($data as $item)
                                      <tr>
                                          <th scope="row"><?=$i;?></th>
                                      <td>{{$item->nama_guru}}</td>
                                      <td >{{$item->nik}}</td>
                                    <td ><img src="{{url('assets/foto_siswa/', $item->picture) }}" width="50" class="rounded-circle" alt="gambar"></td>
            
                                            <td class="text-center">
                                            <a href="{{route('admin.edit',$item->id_guru)}}" class="btn btn-primary">Edit</a>
                                              <form action="{{ route('admin.destroy', $item->id_guru) }}" method="POST" class="d-inline">
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
  <div class="modal fade" id="ImportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col">
                    <input type="file" name="file" id="file" class="form-control" placeholder="First name">
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