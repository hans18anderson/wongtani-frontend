<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('Brand','BrandController');
Route::resource('KeranjangBelanja','KeranjangBelanjaController');
Route::resource('KeranjangBelanjaPetani','KeranjangBelanjaPetaniController');
Route::resource('KeranjangBelanjaPetaniProduk','KeranjangBelanjaPetaniProdukController');
Route::resource('Konsumen','KonsumenController');
Route::resource('KonsumenAlamatKirim','KonsumenAlamatKirimController');
Route::resource('Kurir','KurirController');
Route::resource('Lahan','LahanController');
Route::resource('LahanFoto','LahanFotoController');
Route::resource('LahanJenis','LahanJenisController');
Route::resource('LokasiKecamatan','LokasiKecamatanController');
Route::resource('LokasiKelurahan','LokasiKelurahanController');
Route::resource('LokasiKotaKab','LokasiKotaKabController');
Route::resource('LokasiPropinsi','LokasiPropinsiController');
Route::resource('PelakuUsaha','PelakuUsahaController');
Route::resource('PelakuUsahaBidang','PelakuUsahaBidangController');
Route::resource('PelakuUsahaKoordinator','PelakuUsahaKoordinatorController');
Route::resource('Pengiriman','PengirimanController');
Route::resource('PengirimanKategori','PengirimanKategoriController');
Route::resource('Penjualan','PenjualanController');
Route::resource('PenjualanPelakuStatus','PenjualanPelakuStatusController');
Route::resource('PenjualanPelakuStatusKategori','PenjualanPelakuStatusKategoriController');
Route::resource('PenjualanPelakuUsaha','PenjualanPelakuUsahaController');
Route::resource('PenjualanPelakuUsahaProduk','PenjualanPelakuUsahaProdukController');
Route::resource('Produk','ProdukController');
Route::resource('ProdukFoto','ProdukFotoController');
Route::resource('ProdukKategori','ProdukKategoriController');
Route::resource('ProdukSubKategori','ProdukSubKategoriController');
Route::resource('ProdukSubSubKategori','ProdukSubSubKategoriController');
Route::resource('ProdukTanam','ProdukTanamController');
Route::resource('ProdukTanamPemeliharaan','ProdukTanamPemeliharaanController');
Route::resource('ProdukTanamPerkembangan','ProdukTanamPerkembanganController');
Route::resource('ProdukTanamPerkembanganFoto','ProdukTanamPerkembanganFotoController');
Route::resource('Promosi','PromosiController');
Route::resource('Satuan','SatuanController');
Route::resource('StatusTanam','StatusTanamController');
Route::resource('Tanam','TanamController');
Route::resource('TanamProduk','TanamProdukController');

Route::get('SebaranPelakuUsaha','SebaranController@sebaranPelakuUsaha');
Route::get('SebaranProdukJualPetani','SebaranController@sebaranProdukJualPetani');
Route::get('SebaranProdukJualUMKM','SebaranController@sebaranProdukJualUMKM');
Route::get('TimelinePenjualanProduk','SebaranController@timelinePenjualanProduk');
Route::get('TimelinePenjualanProdukPetani','SebaranController@timelinePenjualanProdukPetani');
Route::get('TimelinePenjualanProdukUMKM','SebaranController@timelinePenjualanProdukUMKM');
Route::get('ProdukJual','ProdukJualController@produkJualList');

Route::get('GetArus/{id_simpang}','ArusController@GetArusList');

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
