@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Konsumen</h6>
        <a href="/AdminUser/koncon"> Kembali</a>
        <br />
        
        <form action="/AdminUser/updatesbiduscon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id5" class="form-control" id="exampleInputNumber1" value="{{$data->id}}">
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="{{$data->nama}}" placeholder="Masukkan Nama">
          </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection