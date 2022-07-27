@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Produk</h6>
        <a href="/control/produkcon"> Kembali</a>
        <br />
        
        <form action="/control/updatesprodukcon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id5" class="form-control" id="exampleInputNumber1" value="{{$data->id}}">
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="{{$data->nama }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="exampleInputText1" value="{{$data->deskripsi }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Nama Sub Sub Kategori</label>
            <select multiple class="form-control" name="id1" id="exampleFormControlSelect2">
              @foreach($subdata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->produk_sub_sub_kategori_id) selected @endif >{{$p->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Nama Pelaku Usaha</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($pelakudata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->pelaku_usaha_id) selected @endif >{{$p->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Nama Satuan</label>
            <select multiple class="form-control" name="id3" id="exampleFormControlSelect2">
              @foreach($satuandata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->satuan_id) selected @endif >{{$p->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Nama Brand</label>
            <select multiple class="form-control" name="id4" id="exampleFormControlSelect2">
              @foreach($branddata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->brand_id) selected @endif >{{$p->nama}}</option>
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