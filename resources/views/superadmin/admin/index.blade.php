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
                        <a href="#" class="btn btn-success"  style="background: linear-gradient(to right,#000046, #1cb5e0);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Admin</a>
  
                      </div>
                  </div> <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Level</th>
                                  <th scope="col">Password</th>
                                  <th scope="col">Sekolah</th>
                                  <th scope="col" class="text-center">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>             
                                <?php $i=1 ;?>
                                @foreach ($admin as $data)
                            
                              <tr>
                              <th scope="row"><?=$i;?></th>
                                <td>{{$data->name}}</td>
                                <td>{{$data->level}}</td>
                                <td>{{$data->password}}</td>
                                <td>{{$data->nama_sekolah}}</td>
                                <td class="text-center">
                                    <a href="{{ route('superadmin.edit' , $data->id) }}" class="btn btn-small btn-primary">Edit</a>
                                    <form action="{{ route('superadmin.destroy', $data->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus??');"> Hapus</button>
                                    </form>
                                </td>
                                
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


  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('superadmin.store')}}" method="post">
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
                          @foreach ($sekolah as $data)
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
  </div>

@endsection