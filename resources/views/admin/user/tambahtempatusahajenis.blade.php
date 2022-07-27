@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Jenis Tempat Usaha</h6>
        <a href="/AdminUser/tempatusahajeniscon"> Kembali</a>
        <br />
        <br />
        <br />
        <form action="/AdminUser/tempatusahajenisconstore" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection