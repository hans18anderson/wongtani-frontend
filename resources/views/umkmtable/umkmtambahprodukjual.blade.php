@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Produk Jual</h6>
        <a href="/control/produkjualcon"> Kembali</a>
        <br />
        <form action="/control/produkjualconstore" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputNumber1">Harga</label>
            <input type="number" name="harga" class="form-control" id="exampleInputNumber1" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputNumber1">Stok</label>
            <input type="number" name="stok" class="form-control" id="exampleInputNumber1" value="">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Produk</label>
            <select multiple class="form-control" name="id1" id="exampleFormControlSelect2">
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