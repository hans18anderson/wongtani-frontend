@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Promosi</h6>
        <a href="/control/promosicon"> Kembali</a>
        <br />
        
        <form action="/control/updatespromosicon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id5" class="form-control" id="exampleInputNumber1" value="{{$data->id}}">
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="{{$data->nama }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Judul</label>
            <input type="text" name="judul" class="form-control" id="exampleInputText1" value="{{$data->judul }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="exampleInputText1" value="{{$data->deskripsi }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" id="exampleInputText1" value="{{$tgl_masuk }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" id="exampleInputText1" value="{{$waktu_masuk }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" id="exampleInputText1" value="{{$tgl_sls }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" id="exampleInputText1" value="{{$waktu_sls }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Kode Promosi</label>
            <input type="text" name="kode_promosi" class="form-control" id="exampleInputText1" value="{{$data->kode_promosi }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Path Foto Promosi</label>
            <input type="text" name="path_foto_promosi" class="form-control" id="exampleInputText1" value="{{ $data->path_foto_promosi }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <input type="hidden" name="id2" class="form-control" id="exampleInputNumber1" value="{{$data->status }}">
          </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection