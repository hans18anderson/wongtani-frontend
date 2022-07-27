@extends('layout.master3')

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
        <h6 class="card-title">Tambah Tempat Usaha</h6>
        <a href="/control/tempatusahacon"> Kembali</a>
        <br />
        <br />
        <br />
        <form action="/control/tempatusahaconstore" method="post">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputText1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputText1" value="" placeholder="Masukkan Name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="exampleInputText1" value="" placeholder="Masukkan Alamat">
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
            <!-- <label for="exampleFormControlSelect2">Pelaku Usaha</label> -->
            <input type="hidden" name="pu_id" value="{{session('pu_id')}}"/>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Kelurahan</label>
            <select multiple class="form-control" name="kelurahan_id" id="exampleFormControlSelect2">
              @foreach($kelurahan as $k)
                <option value="{{$k->id}}">{{$k->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Jenis Tempat Usaha</label>
            <select multiple class="form-control" name="tuj_jenis_id" id="exampleFormControlSelect2">
              @foreach($tempat_usaha_jenis as $tuj)
                <option value="{{$tuj->id}}">{{$tuj->nama}}</option>
              @endforeach
            </select>
          </div>
          <button class="btn btn-primary" type="submit">Simpan</button>
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