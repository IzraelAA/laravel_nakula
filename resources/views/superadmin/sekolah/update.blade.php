@extends('superadmin.dashboard')

@section('content')
    
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
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
            <div class="col-lg-10 col-md-7">
                
                    
                <form method="POST" action="{{route('sekolah.update', $admin[0]->id_sekolah)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12">Sekolah</label>
                        <div class="col-md-12">
                        <input type="text" value="{{$admin[0]->nama_sekolah}}" name="nama_sekolah" id="nama_sekolah" class="form-control form-control-line">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-12">Logo</label>
                        <div class="col-md-12">
                        <input type="file" name="logo" id="logo" >
                        </div>
                    </div>  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                </form>
                  
            
            </div>
            
                       
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

<!-- 
@endsection