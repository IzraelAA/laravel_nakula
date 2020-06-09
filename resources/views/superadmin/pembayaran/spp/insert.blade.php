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
                <li class="breadcrumb-item active">Pembayaran</li>
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
                  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" ><i class="fa fa-plus"></i> Tambah Pembayaran</a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col" class="text-center">Nama Siswa </th>
                            <th scope="col" class="text-center">Tanggal Pembayaran</th>
                            <th scope="col" class="text-center">Spp</th>
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>  
                              <?php $i=1; ?>
                              @foreach ($bayar as $buy)
                                <tr>
                                  <td><?= $i; ?></td>
                                <td>{{$buy->nama_siswa}}</td>
                                <td>{{$buy->tanggal_pembayaran}}</td>
                                <td>{{$buy->bulan_pembayaran}}</td>
                                <td>
                                  <form action="{{ route('pembayaran.destroy', $buy->id_pembayaran) }}" method="POST" class="d-inline">
                                      @csrf
                                      @method('delete')

                                      <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus??');"> Hapus</button>
                                  </form>
                                </td>
                                </tr>
                              <?php $i++ ?>
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
{{-- Modal --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Pembayaran Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('pembayaran.store')}}" method="post">
          @csrf
          <div class="col">
            <label for="nama">Nama Siswa</label>
          <input type="hidden" name="id_kelas" id="id_kelas" value="{{$tes}}">
            <select name="id_siswa" id="id_siswa" class="form-control">
              @foreach ($data as $item)
            <option value="{{$item->id_siswa}}">{{$item->nama_siswa}}</option>
              @endforeach
            </select>
          </div>
           <div class="col">
            <label for="nama">Tanggal bayar</label>
            <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control">
          </div>
           <div class="col">
            <label for="nama">Bulan</label>
            <select name="bulan_pembayaran" id="bulan_pembayaran" class="form-control">
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
            </select>
          </div>
         
           <div class="col">
            <label for="jumlah_bayar">Jumlah Bayar</label>
            <input type="text" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" placeholder="Contoh : Rp 100.000" >
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