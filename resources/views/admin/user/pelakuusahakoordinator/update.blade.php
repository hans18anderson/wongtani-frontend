@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Pelaku Usaha</h6>
        <a href="/AdminUser/peluscon"> Kembali</a>
        <br />
        <form action="/AdminUser/updatespeluscon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id4" class="form-control" id="exampleInputText1" value="{{$data->id}}" placeholder="Enter Status">
        <div class="form-group">
            <input type="hidden" name="username" class="form-control" id="exampleInputText1" value="{{$data->username}}" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <input type="hidden" name="password" class="form-control" id="exampleInputText1" value="{{$data->password}}" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="{{$data->nama}}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="exampleInputText1" value="{{$data->alamat}}" placeholder="Enter Address">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor KTP</label>
            <input type="text" name="nomorktp" class="form-control" id="exampleInputText1" value="{{$data->nomor_KTP}}" placeholder="Enter KTP Number">
          </div>
          <div class="form-group">
            <input type="hidden" name="email" class="form-control" id="exampleInputText1" value="{{$data->email}}" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor Telp</label>
            <input type="text" name="nomortelp" class="form-control" id="exampleInputText1" value="{{$data->nomor_telp}}" placeholder="Enter Phone Numbers">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="exampleInputText1" value="{{$data->deskripsi}}" placeholder="Enter Description">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Catatan</label>
            <input type="text" name="catatan" class="form-control" id="exampleInputText1" value="{{$data->catatan}}" placeholder="Enter Note">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nama CP</label>
            <input type="text" name="namacp" class="form-control" id="exampleInputText1" value="{{$data->nama_cp}}" placeholder="Enter CP Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor Telp CP</label>
            <input type="text" name="nomortelpcp" class="form-control" id="exampleInputText1" value="{{$data->nomor_telp_cp}}" placeholder="Enter CP Phone Number">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">X</label>
            <input type="text" name="x" class="form-control" id="exampleInputText1" value="{{$data->x}}" placeholder="Enter X Position">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Y</label>
            <input type="text" name="y" class="form-control" id="exampleInputText1" value="{{$data->y}}" placeholder="Enter Y Position">
          </div>
          <div class="form-group">
            <input type="hidden" name="id1" class="form-control" id="exampleInputText1" value="{{$data->status}}" placeholder="Enter Status">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Nama Kelurahan</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($kelurahandata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->lokasi_kelurahan_id) selected @endif >{{$p->nama}}</option>
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