@extends('layout.master5')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Update Lokasi Kabupaten Kota</h6>
        <a href="/AdminLokasi/kabkotcon"> Kembali</a>
        <br />
        <form action="/AdminLokasi/updateskabkotcon" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id4" class="form-control" id="exampleInputText1" value="{{$data->id}}" placeholder="Enter Status">
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="{{$data->nama}}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Status</label>
            <input type="text" name="status" class="form-control" id="exampleInputText1" value="{{$data->status}}" placeholder="Enter Status">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Nama Provinsi</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($profdata as $p)
                <option value="{{$p->id}}" @if($p->id == $data->lokasi_propinsi_id) selected @endif >{{$p->nama}}</option>
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