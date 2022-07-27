@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Pelaku Usaha Koordinator</h6>
        <a href="/AdminUser/peluscon"> Kembali</a>
        <br />
        <form action="/AdminUser/pelusconstore" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputText1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputText1" value="" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputText1" value="" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="exampleInputText1" value="" placeholder="Enter Address">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor KTP</label>
            <input type="text" name="nomorktp" class="form-control" id="exampleInputText1" value="" placeholder="Enter KTP Number">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputText1" value="" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor Telp</label>
            <input type="text" name="nomortelp" class="form-control" id="exampleInputText1" value="" placeholder="Enter Phone Numbers">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="exampleInputText1" value="" placeholder="Enter Description">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Catatan</label>
            <input type="text" name="catatan" class="form-control" id="exampleInputText1" value="" placeholder="Enter Note">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nama CP</label>
            <input type="text" name="namacp" class="form-control" id="exampleInputText1" value="" placeholder="Enter CP Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor Telp CP</label>
            <input type="text" name="nomortelpcp" class="form-control" id="exampleInputText1" value="" placeholder="Enter CP Phone Number">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">X</label>
            <input type="text" name="x" class="form-control" id="exampleInputText1" value="" placeholder="Enter X Position">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Y</label>
            <input type="text" name="y" class="form-control" id="exampleInputText1" value="" placeholder="Enter Y Position">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Status</label>
            <input type="text" name="id1" class="form-control" id="exampleInputText1" value="" placeholder="Enter Status">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Lokasi Kelurahan</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($kel_data as $s)
                <option value="{{$s->id}}">{{$s->nama}}</option>
              @endforeach
            </select>
          </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection