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
            <div class="col-lg-10 col-md-7">
                <div class="card">
                    <div class="card-body">
                    @if (session('create'))
                    <div class="alert alert-primary text-center">
                        {{ session('create') }}
            
                    </div>
            @endif
                    <div class="text-right">
                      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Sekolah</a>

                    </div>
                          <table class="table" id="Mytable">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Sekolah</th>
                                <th scope="col">Logo</th>
                                <th scope="col" class="text-center">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($data as $item)
                              <tr>
                                <th scope="row"><?= $i?></th>
                                
                                <td>{{$item->nama_sekolah}}</td>
                                <td><img src="{{url('assets/logo/'.$item->logo)}}" width="50px" alt=""></td>
                                <td class="text-center" >
                                    <a href="{{ route('sekolah.edit' , $item->id_sekolah) }}" class="btn btn-small btn-primary">Edit</a>
                                    <form action="{{ route('sekolah.destroy', $item->id_sekolah) }}" method="POST" class="d-inline">
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Sekolah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
        <form method="POST" action="{{route('sekolah.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Sekolah</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Nama sekolah" name="name" id="name" class="form-control form-control-line">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-md-12">Logo</label>
                    <div class="col-md-12">
                        <input type="file" name="logo" id="logo">
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
<!-- 
@endsection