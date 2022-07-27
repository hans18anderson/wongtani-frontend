@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Produk Jual</h6>
        <a href="/control/produkjualcon">Kembali</a>
        <br />
        
        <form action="/control/updatesprodukjualcon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id2" class="form-control" id="exampleInputNumber1" value="{{$data->id}}">
          <div class="form-group">
            <label for="exampleInputText1">Harga</label>
            <input type="text" name="harga" class="form-control" id="exampleInputText1" value="{{$data->harga }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Stok</label>
            <input type="text" name="stok" class="form-control" id="exampleInputText1" value="{{$data->stok }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Produk</label>
            <select multiple class="form-control" name="id1" id="exampleFormControlSelect2">
              @foreach($data2 as $p)
                <option value="{{$p->id}}" @if($p->id == $data->produk_id) selected @endif >{{$p->nama}}</option>
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