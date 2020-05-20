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
                <li class="breadcrumb-item "><a href="javascript:void(0)">Admin</a></li>
                <li class="breadcrumb-item active">Siswa</li>
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
            <div class="col-lg-10 col-md-6">
              <div class="card">
                <div class="card-body">
            @if (session('create'))
                <div class="alert alert-primary text-center">
                    {{ session('create') }}
                </div>
             @endif
             <div class="action text-right">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus"></i> Tambah Siswa</a>
            </div>
            <table class="table" id="Mytable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nis</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Foto</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                    <?php $i=1 ;?>
                @foreach ($relasi as $item)
                <tr>
                    <th scope="row"><?=$i;?></th>
                <td>{{$item->nama_siswa}}</td>
                <td >{{$item->nis}}</td>
                <td >{{$item->nama_kelas}}</td>
                <td ><img src="{{url('assets/foto_siswa/', $item->foto) }}" width="50" class="rounded-circle" alt="gambar"></td>
                      <td class="text-center">
                      <a href="{{route('siswa.edit',$item->id_siswa)}}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('siswa.destroy', $item->id_siswa) }}" method="POST" class="d-inline">
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
        </div>
    </div>
    <!-- Row -->
    <!-- End PAge Content -->
</div>
<!-- Modal -->
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
            <form action="{{route('siswa.store')}}" method="post">
                @csrf
                     <div class="row">
                       <div class="col">
                           <label for="name">Nama Siswa</label>
                         <input type="hidden" name="id_sekolah" value="{{$data['id']}}">
                         <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama ">
                       </div>
                     </div>
                     <div class="row">
                        <div class="col">
                            <label for="name">Nis</label>
                          <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukan Nis ">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <label for="name">Password</label>
                          <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password ">
                        </div>
                      </div>
                     <div class="row">
                        <div class="col">
                            <label for="name">kelas</label>
                            <select name="id_kelas" class="form-control" id="id_kelas">
                                @foreach ($kelas as $item)
                            <option value="{{$item->id_kelas}}">{{$item->nama_kelas}}</option>
                                    
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