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
                    
        {{-- table --}}
        <div class="card mb-4">
            <div class="card-header d-flex">
              <div class="text-left">
                <i class="fas fa-table mr-1"></i>DataTable Example
              </div>
                <div class="ml-auto">
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Kelas</a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-center">Nama Kelas</th>   
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>             
                          <?php $i=1 ;?>
                          @foreach ($data as $item)
                          <tr>
                              <th scope="row"><?= $i;?></th>
                              <td class="text-center">{{$item->nama_kelas}}</td>
                                <td class="text-center">
                                <a href="{{route('kelas.edit',$item->id_kelas)}}" class="btn btn-primary">Edit</a>
                                  <form action="{{ route('kelas.destroy', $item->id_kelas) }}" method="POST" class="d-inline">
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('kelas.store')}}" method="post">
           @csrf
                <div class="row">
                  <div class="col">
                      <label for="name">Nama Kelas</label>
                  <input type="hidden" name="id_sekolah" value="{{$kelas['id']}}">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama Kelas">
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