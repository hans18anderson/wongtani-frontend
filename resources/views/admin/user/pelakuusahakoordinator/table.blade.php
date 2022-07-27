@extends('layout.master5')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data UMKM</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Pelaku Usaha Koordinator</h6>
        <p class="card-description"><a href="/AdminUser/tambahpeluscon">Add Data</a></p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Opsi</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor KTP</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Deskripsi</th>
                <th>Catatan</th>
                <th>Nama CP</th>
                <th>No Telp CP</th>
                <th>x</th>
                <th>y</th>
                <th>Status</th>
                <th>ID Lokasi Kelurahan</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data_pelaku as $d)
              <tr>
                <td>
                  <a href="">Foto </a>|
                  <a href="/AdminUser/updatepeluscon/{{$d->id}}"> Edit </a>|
                  <a href="/AdminUser/hapuspeluscon/{{$d->id}}"> Hapus</a>
                </td>
                <td>{{$d->username }}</td>
                <td>{{$d->password}}</td>
                <td>{{$d->nama }}</td>
                <td>{{$d->alamat }}</td>
                <td>{{$d->nomor_KTP }}</td>
                <td>{{$d->email }}</td>
                <td>{{$d->nomor_telp }}</td>
                <td>{{$d->deskripsi }}</td>
                <td>{{$d->catatan }}</td>
                <td>{{$d->nama_cp }}</td>
                <td>{{$d->nomor_telp_cp }}</td>
                <td>{{$d->x }}</td>
                <td>{{$d->y }}</td>
                <td>{{$d->status }}</td>
                <td>{{$d->lokasiKelurahan->nama }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush