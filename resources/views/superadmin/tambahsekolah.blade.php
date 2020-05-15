<form action="/tambahadmin" method="post">
@csrf           
    <div class="row">
      <div class="col">
          <label for="nama">Nama Admin</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama">
      </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="level">Level</label>
        <select class="form-control" name="level" id="level">
            <option>Pilih Level</option>
            <option value="admin">Admin</option>
        </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="id_sekolah">Nama Sekolah</label>

            <select name="id_sekolah" id="id_sekolah">
              @foreach ($admin as $data)
              <option value={{$data->id_sekolah}}>{{$data->nama_sekolah}}</option>
              {{print_r($data)}}
              @endforeach
            </select>
        </div>
    </div>
  
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>