@extends('superadmin.dashboardadmin')

@section('content')
    
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Quiz</li>
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
      <div class="row">
        <div class="col-lg-12 col-md-8">
          <div class="card">
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-8">
                <form action="{{route('insert')}}" method="POST">
                     @csrf
                     
                      <div class="form-group">
                          <label for="formGroupExampleInput">Mata Pelajaran</label>
                          <select name="id_dataquiz" id="id_dataquiz" class="form-control" readonly>
                          @foreach ($relasi as $data)
                          <option value="{{$data->id_dataquiz}}">{{$data->nama_pelajaran}}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Soal Quiz</label>
                        <input type="file" class="form-control mb-2" name="file" id="file">
                        <textarea name="quiz" id="quiz" class="form-control" cols="30" rows="5" placeholder="Masukan Soal"></textarea>
                      </div>                
                      
                      <div class="form-group">
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
                      {{-- <div class="ml-auto">
                        <a href="#" class="btn btn-success" style="background: linear-gradient(to right,#000046, #1cb5e0);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Admin</a>
  
                      </div> --}}
                  </div> <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col" class="text-center">Soal Quiz</th>
                                 
                                  {{-- <th scope="col" class="text-center">Aksi</th> --}}
                                </tr>
                              </thead>
                              <tbody>             
                               <?php $i = 1 ; ?>
                               @foreach ($soal as $item)
                              
                                <tr>
                                  <td> <?= $i?></td>
                                <td class="text-center">{{$item->quiz}}</td>
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
            <!-- Column -->
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>


  
 

@endsection