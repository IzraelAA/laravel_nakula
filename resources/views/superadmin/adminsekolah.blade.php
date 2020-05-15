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
                    <div class="action text-right">

                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Admin</a>
                    </div>
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Level</th>
                                <th scope="col">Password</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $data)
                              <tr>
                                <th scope="row">1</th>
                                <td>{{$data->name}}</td>
                                <td>{{$data->level}}</td>
                                <td>{{$data->password}}</td>
                                <td>{{$data->nama_sekolah}}</td>
                                <td class="d-flex">
                                    <a href="#" class="btn btn-small btn-primary">Edit</a>
                                    <a href="#" class="btn btn-small btn-danger">Hapus</a>
                                </td>
                                
                              </tr>
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="" method="post">
           
                <div class="row">
                  <div class="col">
                      <label for="nama">Nama Admin</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama">
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
           
                        <select name="id_sekolah" id="id_sekolah">
                          @foreach ($admin as $data)
                          <option value={{$data->id_sekolah}}>{{$data->nama_sekolah}}</option>
                          {{print_r($data)}}
                          @endforeach
                        </select>
                    </div>
                </div>
              
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<!-- 
@endsection