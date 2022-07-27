@extends('layout.master3')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Produk Jual</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Produk Jual</h6>
        <p class="card-description"><a href="/control/tambahprodukjualcon">Add Data</a></p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Opsi</th>
                <th>harga</th>
                <th>stok</th>
                <th>Nama Produk</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data_produk_jual as $d)
              <tr>
                <td>
                  <a href="/control/updateprodukjualcon/{{$d->id}}">Edit </a>|
                  <a href="/control/hapusprodukjualcon/{{$d->id }}"> Hapus</a>
                </td>
                <td>{{$d->harga}}</td>
                <td>{{$d->stok}}</td>
                <td>{{$d->Produk->nama}}</td>
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