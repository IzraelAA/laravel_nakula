@extends('superadmin.dashboardguru')

@section('content')
    
<div class="container-fluid">
    
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Jadwal</li>
            </ol>
        </div>
     
    </div>
  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="card">
                <div class="card-body">
                  <p>Note <br><span style="color:red">Pastikan data yang mau di update sudah benar</span></p>
                     <form action="{{route('jadwal.update', $jadwal[0]->id_jadwal)}}" method="post">
                      @method('PUT')
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
                             <select name="nama_pelajaran" id="nama_pelajaran" class="form-control">
                                @foreach ($mapel as $item)
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
    </div>
  </div>
@endsection




