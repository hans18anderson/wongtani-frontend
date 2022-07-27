@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Sub Sub Kategori Produk</h6>
        <a href="/AdminProduk/subsubkatprocon"> Kembali</a>
        <br />
        
        <form action="/AdminProduk/updatessubsubkatprocon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id5" class="form-control" id="exampleInputNumber1" value="{{$data->id}}">
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="{{$data->nama}}" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Sub Kategori Produk</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($data2 as $p)
                <option value="{{$p->id}}" @if($p->id == $data->produk_sub_kategori_id) selected @endif >{{$p->nama}}</option>
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