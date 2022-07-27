@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Sub Sub Kategori Produk</h6>
        <a href="/AdminProduk/subsubkatprocon">Kembali</a>
        <br />
        <br />
        <form action="/AdminProduk/subsubkatproconstore" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Kategori Sub Produk</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($produk_data as $p)
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