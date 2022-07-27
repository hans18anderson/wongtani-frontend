@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Penjualan Produk Pelaku Usaha</h6>
        <a href="/control/projualcon"> Kembali</a>
        <br />
        
        <form action="/control/updatesprojualcon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id5" class="form-control" id="exampleInputNumber1" value="{{$data->id}}">
          <div class="form-group">
            <label for="exampleInputText1">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" id="exampleInputText1" value="{{$data->jumlah }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Harga Jual</label>
            <input type="text" name="harga" class="form-control" id="exampleInputText1" value="{{$data->harga_jual }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Catatan</label>
            <input type="text" name="catatan" class="form-control" id="exampleInputText1" value="{{$data->catatan}}" placeholder="Enter Name">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Keterangan Penjualan Pelaku Usaha</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($pelakudata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->penjualan_pelaku_usaha_id) selected @endif >{{$p->keterangan}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Harga Produk Jual</label>
            <select multiple class="form-control" name="id1" id="exampleFormControlSelect2">
              @foreach($jualdata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->produk_jual_id) selected @endif >{{$p->harga}}</option>
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