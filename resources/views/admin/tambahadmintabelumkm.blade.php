@extends('layout.master5')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Pelaku Usaha</h6>
        <a href="/control/adminumkmcon"> Kembali</a>
        <br />
        <form action="/control/adminumkmconstore" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputText1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputText1" value="" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputText1" value="" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="exampleInputText1" value="" placeholder="Enter Address">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor KTP</label>
            <input type="text" name="nomorktp" class="form-control" id="exampleInputText1" value="" placeholder="Enter KTP Number">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputText1" value="" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor Telp</label>
            <input type="text" name="nomortelp" class="form-control" id="exampleInputText1" value="" placeholder="Enter Phone Numbers">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="exampleInputText1" value="" placeholder="Enter Description">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Catatan</label>
            <input type="text" name="catatan" class="form-control" id="exampleInputText1" value="" placeholder="Enter Note">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nama CP</label>
            <input type="text" name="namacp" class="form-control" id="exampleInputText1" value="" placeholder="Enter CP Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Nomor Telp CP</label>
            <input type="text" name="nomortelpcp" class="form-control" id="exampleInputText1" value="" placeholder="Enter CP Phone Number">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Pilih Lokasi</label>
            <div id="map" style="height: 50vh">
            </div>
          </div>
          <input type="hidden" name="koordinat" class="form-control" id="koordinat" value="" placeholder="Enter X Position">
          <input type="hidden" name="x" class="form-control" id="koordinatx" value="" placeholder="Enter X Position">
          <input type="hidden" name="y" class="form-control" id="koordinaty" value="" placeholder="Enter Y Position">
          <div class="form-group">
            <label for="exampleInputText1">Status</label>
            <input type="text" name="id1" class="form-control" id="exampleInputText1" value="" placeholder="Enter Status">
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Lokasi Kelurahan</label>
            <select multiple class="form-control" name="id2" id="exampleFormControlSelect2">
              @foreach($kel_data as $s)
                <option value="{{$s->id}}">{{$s->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Koordinator Pelaku Usaha</label>
            <select multiple class="form-control" name="id3" id="exampleFormControlSelect2">
              @foreach($koor_data as $b)
                <option value="{{$b->id}}">{{$b->nama}}</option>
              @endforeach
            </select>
          </div>
          <button class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  var marker = null
  var map = L.map('map').setView([0.5097592328584029, 101.44889094530086], 13);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

  map.addEventListener('click',(e)=>{
    console.log(e.latlng)
    if(marker!=null)  map.removeLayer(marker)
    marker = L.marker([e.latlng.lat , e.latlng.lng]).addTo(map)
      .bindPopup(`Selected Map <br /> ${e.latlng.lat} , ${e.latlng.lng}`)
      .openPopup();
      document.getElementById('koordinat').value= `${e.latlng.lat},${e.latlng.lng}`
      document.getElementById('koordinatx').value= `${e.latlng.lat}`
      document.getElementById('koordinaty').value= `${e.latlng.lng}`
  });
</script>

@endsection