@extends('superadmin.dashboardguru')

@section('content')
    
<div class="container-fluid">
    
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelas</li>
            </ol>
        </div>
     
    </div>
  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
             <div class="card">
                 <div class="card-body">
                    <form action="{{route('kelas.update',$kelas[0]->id_kelas)}}" method="post">
                        @method('PUT')
                        @csrf           
                            <div class="row">
                              <div class="col">
                                  <label for="nama">Nama Kelas</label>
                              <input type="hidden" name="id_sekolah" value="{{$kelas[0]->id_sekolah}}">
                              <input type="text" class="form-control" name="name" id="name" value="{{$kelas[0]->nama_kelas}}">
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
  </div>


@endsection