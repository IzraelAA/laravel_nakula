@extends('superadmin.dashboardguru')

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
                  <div class="action text-right">

                  <a href="{{route('guru.create')}}" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah Guru</a>
                  </div>
                        <table class="table">
                          <thead class="thead-light">
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
                                <a href="{{route('guru.edit',$item->id_guru)}}" class="btn btn-primary">Edit</a>
                                  <form action="{{ route('guru.destroy', $item->id_guru) }}" method="POST" class="d-inline">
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



@endsection