@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Status Penjualan Pelaku Usaha</h6>
        <a href="/control/penjualanstatuscon"> Kembali</a>
        <br />
        
        <form action="/control/updatespenjualanstatuscon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id5" class="form-control" id="exampleInputNumber1" value="{{$data->id}}">
          <div class="form-group">
            <label for="exampleInputText1">tanggal</label>
            <input type="date" name="jumlah" class="form-control" id="exampleInputText1" value="{{$data->tanggal }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="exampleInputText1" value="{{$data->keterangan }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Status</label>
            <input type="text" name="status" class="form-control" id="exampleInputText1" value="{{$data->status}}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <input type="hidden" name="id2" class="form-control" id="exampleInputNumber1" value="{{$data->penjualan_status_kategori_id }}">
            <input type="hidden" name="id1" class="form-control" id="exampleInputNumber1" value="{{$data->penjualan_pelaku_usaha_id }}">
          </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection