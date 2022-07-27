@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Konsumen</h6>
        <a href="/AdminUser/koncon"> Kembali</a>
        <br />
        
        <form action="/AdminUser/updateskoncon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id5" class="form-control" id="exampleInputNumber1" value="{{$data->id}}">
        <div class="form-group">
            <label for="exampleInputText1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputText1" value="{{$data->username}}" placeholder="Masukkan Username">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputText1" value="{{$data->password}}" placeholder="Masukkan Password">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="{{$data->nama}}" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="exampleInputText1" value="{{$data->alamat}}" placeholder="Masukkan Alamat">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor KTP</label>
            <input type="text" name="no_ktp" class="form-control" id="exampleInputText1" value="{{$data->nomor_KTP}}" placeholder="Masukkan Nomor KTP">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputText1" value="{{$data->email}}" placeholder="Masukkan Email">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor Telepon</label>
            <input type="text" name="no_telp" class="form-control" id="exampleInputText1" value="{{$data->nomor_telp}}" placeholder="Masukkan Nomor Telepon">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Status</label>
            <input type="text" name="status" class="form-control" id="exampleInputText1" value="{{$data->status}}" placeholder="Masukkan Status">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Nama Kelurahan</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($data2 as $p)
                <option value="{{$p->id}}" @if($p->id == $data->kelurahan_id) selected @endif >{{$p->nama}}</option>
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