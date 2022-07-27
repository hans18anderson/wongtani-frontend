@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Status Penjualan Pelaku Usaha</h6>
        <a href="/control/penjualanstatuscon"> Kembali</a>
        <br />
        <form action="/control/penjualanstatusconstore" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputText1">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Status</label>
            <input type="text" name="status" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Penjualan Pelaku Usaha</label>
            <select multiple class="form-control" name="id1" id="exampleFormControlSelect2">
              @foreach($pelaku_data as $p)
                <option value="{{$p->id}}">{{$p->nomor_invoice}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Penjualan Status Kategori</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($jual_data as $p)
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