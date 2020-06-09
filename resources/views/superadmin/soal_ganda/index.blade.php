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
        <li class="breadcrumb-item "><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active">Soal Ganda</li>
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
      <div class="col-lg-12 col-md-6">

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
            <a href="{{route('soal-ganda.create')}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fa fa-plus"></i> Buat Soal</a>

            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Ujian </th>
                    <th scope="col">Guru </th>
                    <th scope="col">Mata Pelajaran</th>
                    {{-- <th scope="col">Jumlah Soal</th> --}}
                    {{-- <th scope="col">Tanggal Dibuat</th> --}}
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach ($soal as $item)
                    <tr>
                    <td><?= $i?></td>
                    <td>{{$item->nama_soal}}</td>
                    <td>{{$item->nama_guru}}</td>
                    <td>{{$item->nama_pelajaran}}</td>
                    {{-- <td>{{$item->created_at}}</td> --}}
                    <td class="text-center">
                      <a href="{{route('soal-ganda.edit', $item->id_datasoal)}}" class="btn btn-success">Tambah Soal</a>
                      <form action="{{ route('soal-ganda.destroy', $item->id_datasoal) }}" method="POST" class="d-inline">
                          @csrf
                         @method('delete')
          
                           <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus??');"> Hapus</button>
                      </form>
                    </td>
                    </tr>
                <?php $i++;?>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{-- end table --}}

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
        <h5 class="modal-title" id="exampleModalLabel">Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('soal-ganda.store')}}">
          @csrf
          <div class="form-group">
            <label for="nama_soal">Nama Ujian</label>
          <input type="text" class="form-control" name="nama_soal" id="nama_soal" placeholder="Masukan Nama Ujian">
          </div>
          <div class="form-group">
            <label for="data_soal">Mata Pelajaran</label>
            <input type="hidden" name="id_sekolah" id="id_sekolah" value="{{$data['id']}}">
            <select name="id_mapel" id="id_mapel" name="id_mapel" class="form-control">
              @foreach ($relasi as $item)
            <option value="{{$item->id_mapel}}">{{$item->nama_pelajaran}}</option>
              @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save </button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

@endsection