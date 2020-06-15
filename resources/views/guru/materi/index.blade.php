@extends('superadmin.home_dashboardguru')

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
                <li class="breadcrumb-item "><a href="javascript:void(0)">Guru</a></li>
                <li class="breadcrumb-item active">Materi</li>
            </ol>
        </div>
        {{-- <div class="col-md-6 col-4 align-self-center">
            <a href="https://wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down btn-success"> Upgrade to Pro</a>
        </div> --}}
    </div>

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
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Materi</a>
  
                      </div>
                  </div> <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col"> Pelajaran</th>
                                  <th scope="col"> Kelas</th>
                                  <th scope="col">Guru</th>
                                  <th scope="col"> Materi</th>
                                  <th scope="col">File</th>
                                  <th scope="col">Keterangan</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>             
                                <?php $i=1 ;?>
                                @foreach ($materi as $item)
                                {{-- {{dd($item)}} --}}
                                <tr>
                                    <th scope="row"><?= $i;?></th>
                                    <td class="text-center">{{$item->nama_pelajaran}}</td>
                                    <td class="text-center">{{$item->nama_kelas}}</td>
                                    <td class="text-center">{{$item->nama_guru}}</td>
                                    <td class="text-center">{{$item->nama_materi}}</td>
                                    <td class="text-center"><span class="badge badge-info"> PDF</span></td>
                                    <td class="text-center">{{$item->keterangan}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('guru-materi.destroy', $item->id_materi) }}" method="POST" class="d-inline">
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
    <!-- End PAge Content -->
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('guru-materi.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                     <div class="row">
                       <div class="col">
                           <label for="name">Nama Pelajaran</label>
                       <input type="hidden" name="id_sekolah" value="{{$data['id']}}">
                            <select name="id_kelas" id="id_kelas" class="form-control">
                                @foreach ($relasi as $item)
                                <option value="{{$item->id_mapel}}">{{$item->nama_pelajaran}}</option>
                                @endforeach
                            </select>
                       </div>
                     </div>
                     <div class="row mt-2">
                        <div class="col">
                            <label for="name">Nama Materi</label>
                          <input type="text" class="form-control" name="nama_materi" id="nama_materi" placeholder="Masukan Nama Materi">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <label for="file">file</label>
                          <input type="file" class="form-control" name="file" id="file" >
                          <p>* <span style="color: red">pdf</span></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <label for="keterangan">keterangan</label>
                          <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan">
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