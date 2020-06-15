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
                <li class="breadcrumb-item active">Mata Pelajaran</li>
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
                            <a href="{{route('mapel.create')}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pelajaran</a>

    
                        </div>
                    </div> <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Nama Guru</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>             
                                  
                                <?php $i=1 ;?>
                                @foreach ($data as $item)
                                {{-- {{dd($item)}} --}}
                                <tr>
                                    <th scope="row"><?= $i;?></th>
                                    <td class="text-center">{{$item->nama_pelajaran}}</td>
                                    <td class="text-center">{{$item->nama_guru}}</td>
                                    <td class="text-center">{{$item->nama_kelas}}</td>
                                      <td class="text-center">
                                          <a href="{{ route('mapel.edit', $item->id_mapel) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('mapel.destroy', $item->id_mapel) }}" method="POST" class="d-inline">
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
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('mapel.store')}}" method="post">
                @csrf           
                    <div class="row">
                      <div class="col">
                          <label for="nama">Nama Mata Pelajaran</label>
                            <select name="name" id="name" class="form-control">
                                @foreach ($mapel as $data)
                            <option value="{{$data->name_mapel}}">{{$data->name_mapel}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <div class="row">
                      <div class="col">
                          <label for="nama">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="id_guru">Nama Guru</label>
                            <select name="id_guru" class="form-control" id="id_guru">
                              @foreach ($guru as $data)
                              <option value={{$data->id_guru}}>{{$data->nama_guru}}</option>
                              {{-- {{print_r($data)}} --}}
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="id_kelas">kelas </label>
                            <select name="id_kelas" class="form-control" id="id_kelas">
                              @foreach ($kelas as $data)
                              <option value={{$data->id_kelas}}>{{$data->nama_kelas}}</option>
                              {{-- {{print_r($data)}} --}}
                              @endforeach
                            </select>
                        </div>
                    </div>
                  
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
        </div>
       
      </div>
    </div>
  </div>
@endsection