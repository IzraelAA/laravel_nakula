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
                <li class="breadcrumb-item active">Soal Pilihan Ganda</li>
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
         <div class="col-md-12">
           
            {{-- card Soal --}}
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-center">
                  <div class="col-md-8">
                  <form action="{{route('nakula.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="formGroupExampleInput">Mata Pelajaran)</label>
                        
                        <select name="id_datasoal" id="id_datasoal" readonly class="form-control">
                          @foreach ($relasi as $rela)
                        <option value="{{$rela->id_datasoal}}">{{$rela->nama_pelajaran}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Soal</label>
                        <input type="file" class="form-control mb-2" name="file" id="file">
                        <textarea name="soal" id="soal" class="form-control" cols="30" rows="5" placeholder="Masukan Soal"></textarea>
                        </div>
                      <div class="form-group">
                        <label for="opsi_a">Jawaban A</label>
                        <textarea name="opsi_a" id="opsi_a" cols="30" rows="2" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="opsi_b">Jawaban B</label>
                        <textarea name="opsi_b" id="opsi_b" cols="30" rows="2" class="form-control"></textarea>
                       </div>
                      <div class="form-group">
                        <label for="opsi_c">Jawaban C</label>
                        <textarea name="opsi_c" id="opsi_c" cols="30" rows="2" class="form-control"></textarea>
                     </div>
                      <div class="form-group">
                        <label for="opsi_d">Jawaban D</label>
                        <textarea name="opsi_d" id="opsi_d" cols="30" rows="2" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="opsi_e">Jawaban E</label>
                        <textarea name="opsi_e" id="opsi_e" cols="30" rows="2" class="form-control"></textarea>
                     </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Kunci Jawaban</label>
                        <select name="jawaban" id="jawaban" class="form-control">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="E">E</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="bobot">Bobot Soal</label>
                      <input type="number" required class="form-control" value="1" name="bobot" id="bobot">
                      </div>
                      <div class="form-group">
                     <button type="submit" class="btn btn-primary">Simpan</button>
                     <a href="#" class="btn btn-secondary">Cancel</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          {{-- End Soal --}}
          
         </div>
        </div>
        <div class="row">
          <div class="col-md-12">
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
                     @if (session('create'))
                    <div class="alert alert-primary text-center">
                      {{ session('create') }}
                    </div>
                    @endif
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Soal</th>
                                  <th scope="col">A</th>
                                  <th scope="col">B</th>
                                  <th scope="col">C</th>
                                  <th scope="col">D</th>
                                  <th scope="col">E</th>
                                  <th scope="col">Jawaban</th>
                                  <th scope="col">Bobot</th>
                                  {{-- <th scope="col" class="text-center">Aksi</th> --}}
                                </tr>
                              </thead>
                              <tbody>             
                                <?php $i=1 ;?>
                                @foreach ($data as $item)
                            
                              <tr>
                              <th scope="row"><?=$i;?></th>
                                <td>{{$item->soal}}</td>
                                <td>{{$item->opsi_a}}</td>
                                <td>{{$item->opsi_b}}</td>
                                <td>{{$item->opsi_c}}</td>
                                <td>{{$item->opsi_d}}</td>
                                <td>{{$item->opsi_e}}</td>
                                <td>{{$item->jawaban}}</td>
                                <td>{{$item->bobot}}</td>
                                
                               
                                
                              </tr>
                              <?php $i++; ?>
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
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>


  

@endsection