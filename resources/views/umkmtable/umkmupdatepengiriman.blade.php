@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Kurir</h6>
        <a href="/control/pengirimancon"> Kembali</a>
        <br />
        
        <form action="/control/updatespengirimancon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id5" class="form-control" id="exampleInputNumber1" value="{{$data->id}}">
          <div class="form-group">
            <label for="exampleInputText1">Tarif</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="{{$data->tarif }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Pelaku Usaha</label>
            <select multiple class="form-control" name="id3" id="exampleFormControlSelect2">
              @foreach($pelakudata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->pelaku_usaha_id) selected @endif >{{$p->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Kurir</label>
            <select multiple class="form-control" name="id1" id="exampleFormControlSelect2">
              @foreach($kurirdata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->kurir_id) selected @endif >{{$p->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Pengiriman Kategori</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($kategoridata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->pengiriman_kategori_id) selected @endif >{{$p->nama}}</option>
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