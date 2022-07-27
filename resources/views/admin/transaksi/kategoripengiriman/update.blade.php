@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Kategori Pengiriman</h6>
        <a href="/AdminLokasi/lahcon"> Kembali</a>
        <br />
        <form action="/AdminTransaksi/updateskatpengcon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id4" class="form-control" id="exampleInputText1" value="{{$data->id}}" placeholder="Enter Status">
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="{{$data->nama}}" placeholder="Enter Name">
          </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection