@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Penjualan Produk Pelaku Usaha</h6>
        <a href="/control/projualcon"> Kembali</a>
        <br />
        <form action="/control/projualconstore" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputText1">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Harga</label>
            <input type="text" name="harga" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Catatan</label>
            <input type="text" name="catatan" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Harga Produk Jual</label>
            <select multiple class="form-control" name="id1" id="exampleFormControlSelect2">
              @foreach($jual_data as $p)
                <option value="{{$p->id}}">{{$p->harga}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Penjualan Pelaku Usaha</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($pelaku_data as $p)
                <option value="{{$p->id}}">{{$p->nomor_invoice}}</option>
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