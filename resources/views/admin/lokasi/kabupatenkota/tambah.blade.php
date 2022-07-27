@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Lokasi Kabupaten Kota</h6>
        <a href="/AdminLokasi/kabkotcon">Kembali</a>
        <br />
        <br />
        <form action="/AdminLokasi/kabkotconstore" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Status</label>
            <input type="text" name="status" class="form-control" id="exampleInputText1" value="" placeholder="Masukkan Status">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Lokasi Provinsi</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($data as $p)
                <option value="{{$p->id}}">{{$p->nama}}</option>
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