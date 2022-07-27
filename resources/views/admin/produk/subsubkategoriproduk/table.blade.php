@extends('layout.master5')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Sub Sub Kategori Produk</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Sub Sub Kategori Produk</h6>
        <p class="card-description"><a href="/AdminProduk/tambahsubsubkatprocon">Add Data</a></p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Opsi</th>
                <th>Nama</th>
                <th>ID Sub Kategori Produk</th>
                <th>Sub Kategori Produk</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data_sub_sub_kategori_produk as $d)
              <tr>
                <td>
                  <a href="/AdminProduk/updatesubsubkatprocon/{{$d->id}}">Edit</a>
                  <a href="/AdminProduk/hapussubsubkatprocon/{{$d->id }}">Hapus</a>
                </td>
                <td>{{$d->nama}}</td>
                <td>{{$d->produk_sub_kategori_id}}</td>
                <td>{{$d->produkSubKategori->nama}}</td>
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