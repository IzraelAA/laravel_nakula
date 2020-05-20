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
            <div class="col-lg-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        
            @if (session('create'))
            <div class="alert alert-primary text-center">
                {{ session('create') }}
    
            </div>
    @endif
                    <div class="action text-right">

                    <a href="{{route('jadwal.create')}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah Jadwal</a>
                    </div>
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center">Nama pelajaran</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">Hari</th>
                                <th scope="col" class="text-center">Jam Masuk</th>
                                <th scope="col" class="text-center">Jam Keluar</th>
                                <th scope="col" class="text-center">Nama Guru</th>
                                
                                <th scope="col" class="text-center">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                                <?php $i=1 ;?>
                            @forelse ($relasi as $item)
                            {{-- {{dd($item)}} --}}
                            <tr>
                                <th scope="row"><?= $i;?></th>
                                <td class="text-center">{{$item->nama_pelajaran}}</td>
                                <td class="text-center">{{$item->nama_kelas}}</td>
                                <td class="text-center">{{$item->hari}}</td>
                                <td class="text-center">{{$item->masuk}}</td>
                                <td class="text-center">{{$item->keluar}}</td>
                                <td class="text-center">{{$item->nama_guru}}</td>
                                  <td class="text-center">
                                  <a href="{{ route('jadwal.edit' , $item->id_jadwal) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('jadwal.destroy', $item->id_jadwal) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus??');"> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++?>
                            @empty
                            <tr>
                               <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                             
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Jadwal Pelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('jadwal.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="kelas">Nama Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                           @foreach ($kelas as $item)
                        <option value="{{$item->id_kelas}}">{{$item->nama_kelas}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id_sekolah" value="{{$data['id']}}">
                    
                </div>
                  </div>
                     <div class="row">
                       <div class="col">
                           <label for="name">Nama Pelajaran</label>
                       {{-- <input type="hidden" name="id_sekolah" value="{{$data[0]->id_sekolah}}"> --}}
                       <select name="nama_pelajaran" id="nama_pelajaran" class="form-control">
                           @foreach ($mapel as $item)
                           {{-- {{dd($mapel)}} --}}
                       <option value="{{$item->id_mapel}}">{{$item->nama_pelajaran}}</option>
                               
                           @endforeach
                     </select>
                       </div>
                     </div>
                      <div class="row">
                        <div class="col">
                            <label for="guru">Nama Guru</label>
                            <select name="guru" id="guru" class="form-control">
                               @foreach ($guru as $item)
                            <option value="{{$item->id_guru}}">{{$item->nama_guru}}</option>
                               @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <label for="hari">Hari</label>
                           <select name="hari" class="form-control" id="hari">
                               <option value="Senin">Senin</option>
                               <option value="Selasa">Selasa</option>
                               <option value="Rabu">Rabu</option>
                               <option value="Kamis">Kamis</option>
                               <option value="Jum'at">Jum'at</option>
                           </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <label for="masuk">Jam Masuk</label>
                           <select name="masuk" class="form-control" id="masuk">
                               <option value="08:00">08:00</option>
                               <option value="09:00">09:00</option>
                               <option value="10:00">10:00</option>
                               <option value="11:00">11:00</option>
                           </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <label for="keluar">Jam keluar</label>
                            <select name="keluar" class="form-control" id="keluar">
                                <option value="12:00">12:00</option>
                                <option value="01:00">01:00</option>
                                <option value="02:00">02:00</option>
                                <option value="03:00">03:00</option>
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