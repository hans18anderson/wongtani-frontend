@extends('layout.master3')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Satuan</h6>
        <a href="/control/satuancon"> Kembali</a>
        <br />
        <form action="/control/satuanconstore" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Pelaku Usaha</label>
            <select multiple class="form-control" name="id1" id="exampleFormControlSelect2">
              @foreach($pelaku_data as $p)
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