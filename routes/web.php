<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.log');
});

use Illuminate\Support\Facades\Route; 
 
Route::get('produk','ProdukJual@index');
Route::get('sebaran','ViewSebaranController@index');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
//Route::get('register', 'AuthController@showFormRegister')->name('register');
//Route::post('register', 'AuthController@register');



/* tambahan maps */
// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/homePlace', 'PlaceMapController@index')->name('frontpage');
Route::get('/place/data', 'DataController@places')->name('place.data'); // DATA TABLE CONTROLLER

Route::group(['middleware' => ['auth']], function () {
    Route::resource('places', 'PlaceController');
});
/* tambahan maps */


Route::group(['middleware' => 'auth'], function () {
 
    //Route::get('home', 'HomeController@index')->name('home');
    //Route::get('logout', 'AuthController@logout')->name('logout');
    
 
});

Route::group(['prefix' => 'general'], function(){
    Route::get('dashboard',function(){return view('dashboard'); });
    Route::get('log',function(){
        Auth::logout();
        return view('auth.log'); 
    });
    Route::get('map',function(){return view('graph.map'); });
    Route::get('map2',function(){return view('graph.map2'); });
    Route::get('map3',function(){return view('graph.map3'); });
    Route::get('regis',function(){return view('auth.regis'); });
    Route::get('admindash',function(){return view('admindash'); });
    Route::get('pemdash',function(){return view('pemdash'); });
    Route::get('addash',function(){return view('addash'); });
});
//Controller untuk homepage admin pada sub menu produk
Route::group(['prefix' => 'AdminProduk'], function(){
    //kelola kategori produk
    Route::get('katprocon','ProdukKategoriController@index');
    Route::get('tambahkatprocon','ProdukKategoriController@tambah');
    Route::post('katproconstore','ProdukKategoriController@create');
    Route::get('/updatekatprocon/{id}','ProdukKategoriController@update');
    Route::post('updateskatprocon','ProdukKategoriController@updates');
    Route::get('/hapuskatprocon/{id}','ProdukKategoriController@hapus');

    //kelola sub kategori produk
    Route::get('subkatprocon','ProdukSubKategoriController@index');
    Route::get('tambahsubkatprocon','ProdukSubKategoriController@tambah');
    Route::post('subkatproconstore','ProdukSubKategoriController@create');
    Route::get('/updatesubkatprocon/{id}','ProdukSubKategoriController@update');
    Route::post('updatessubkatprocon','ProdukSubKategoriController@updates');
    Route::get('/hapussubkatprocon/{id}','ProdukSubKategoriController@hapus');

    //kelola sub sub kategori produk
    Route::get('subsubkatprocon','ProdukSubSubKategoriController@index');
    Route::get('tambahsubsubkatprocon','ProdukSubSubKategoriController@tambah');
    Route::post('subsubkatproconstore','ProdukSubSubKategoriController@create');
    Route::get('/updatesubsubkatprocon/{id}','ProdukSubSubKategoriController@update');
    Route::post('updatessubsubkatprocon','ProdukSubSubKategoriController@updates');
    Route::get('/hapussubsubkatprocon/{id}','ProdukSubSubKategoriController@hapus');

});

Route::group(['prefix' => 'AdminUser'], function(){
    //Kelola konsumen
    Route::get('koncon','KonsumenController@index');
    Route::get('tambahkoncon','KonsumenController@tambah');
    Route::post('konconstore','KonsumenController@create');
    Route::get('/updatekoncon/{id}','KonsumenController@update');
    Route::post('updateskoncon','KonsumenController@updates');
    Route::get('/hapuskoncon/{id}','KonsumenController@hapus');

        
    //Controller untuk tabel TempatUsahaJenis
    Route::get('tempatusahajeniscon','TempatUsahaJenisController@index');
    Route::get('tambahtempatusahajeniscon','TempatUsahaJenisController@tambah');
    Route::post('tempatusahajenisconstore','TempatUsahaJenisController@create');
    Route::post('updatestempatusahajeniscon','TempatUsahaJenisController@updates');
    Route::get('/updatetempatusahajeniscon/{id}','TempatUsahaJenisController@update');
    Route::get('/hapustempatusahajeniscon/{id}','TempatUsahaJenisController@hapus');

   
    //Kelola Pelaku Usaha Koordinator
    Route::get('peluscon','PelakuUsahaKoordinatorController@index');
    Route::get('tambahpeluscon','PelakuUsahaKoordinatorController@tambah');
    Route::post('pelusconstore','PelakuUsahaKoordinatorController@create');
    Route::get('/updatepeluscon/{id}','PelakuUsahaKoordinatorController@update');
    Route::post('updatespeluscon','PelakuUsahaKoordinatorController@updates');
    Route::get('/hapuspeluscon/{id}','PelakuUsahaKoordinatorController@hapus');

    //Kelola Bidang Usaha
    Route::get('biduscon','BidangUsahaController@index');
    Route::get('tambahbiduscon','BidangUsahaController@tambah');
    Route::post('bidusconstore','BidangUsahaController@create');
    Route::get('/updatebiduscon/{id}','BidangUsahaController@update');
    Route::post('updatesbiduscon','BidangUsahaController@updates');
    Route::get('/hapusbiduscon/{id}','BidangUsahaController@hapus');
});

Route::group(['prefix' => 'AdminLokasi'], function(){
    //Kelola Provinsi
    Route::get('procon','LokasiPropinsiController@index');
    Route::get('tambahprocon','LokasiPropinsiController@tambah');
    Route::post('proconstore','LokasiPropinsiController@create');
    Route::get('/updateprocon/{id}','LokasiPropinsiController@update');
    Route::post('updatesprocon','LokasiPropinsiController@updates');
    Route::get('/hapusprocon/{id}','LokasiPropinsiController@hapus');

    //Kelola Kabupaten Kota
    Route::get('kabkotcon','LokasiKotakabController@index');
    Route::get('tambahkabkotcon','LokasiKotakabController@tambah');
    Route::post('kabkotconstore','LokasiKotakabController@create');
    Route::get('/updatekabkotcon/{id}','LokasiKotakabController@update');
    Route::post('updateskabkotcon','LokasiKotakabController@updates');
    Route::get('/hapuskabkotcon/{id}','LokasiKotakabController@hapus');

    //Kelola Kecamatan
    Route::get('keccon','LokasiKecamatanController@index');
    Route::get('tambahkeccon','LokasiKecamatanController@tambah');
    Route::post('kecconstore','LokasiKecamatanController@create');
    Route::get('/updatekeccon/{id}','LokasiKecamatanController@update');
    Route::post('updateskeccon','LokasiKecamatanController@updates');
    Route::get('/hapuskeccon/{id}','LokasiKecamatanController@hapus');

    //Kelola Kelurahan
    Route::get('kelcon','LokasiKelurahanController@index');
    Route::get('tambahkelcon','LokasiKelurahanController@tambah');
    Route::post('kelconstore','LokasiKelurahanController@create');
    Route::get('/updatekelcon/{id}','LokasiKelurahanController@update');
    Route::post('updateskelcon','LokasiKelurahanController@updates');
    Route::get('/hapuskelcon/{id}','LokasiKelurahanController@hapus');

    //Kelola Jenis Lahan
    Route::get('lahcon','LahanJenisController@index');
    Route::get('tambahlahcon','LahanJenisController@tambah');
    Route::post('lahconstore','LahanJenisController@create');
    Route::get('/updatelahcon/{id}','LahanJenisController@update');
    Route::post('updateslahcon','LahanJenisController@updates');
    Route::get('/hapuslahcon/{id}','LahanJenisController@hapus');
});

Route::group(['prefix' => 'AdminTransaksi'], function(){
    //Kelola Kategori Pengiriman
    Route::get('katpengcon','PengirimanKategoriController@index');
    Route::get('tambahkatpengcon','PengirimanKategoriController@tambah');
    Route::post('katpengconstore','PengirimanKategoriController@create');
    Route::get('/updatekatpengcon/{id}','PengirimanKategoriController@update');
    Route::post('updateskatpengcon','PengirimanKategoriController@updates');
    Route::get('/hapuskatpengcon/{id}','PengirimanKategoriController@hapus');
});

Route::group(['prefix' => 'control'], function(){
    //Controller untuk tabel Pelaku Usaha (UMKM)
    Route::get('adminumkmcon','PelakuUsahaController@index');
    Route::get('tambahadminumkmcon','PelakuUsahaController@tambah');
    Route::post('adminumkmconstore','PelakuUsahaController@create');
    Route::get('/updateadminumkmcon/{id}','PelakuUsahaController@update');
    Route::post('updatesadminumkmcon','PelakuUsahaController@updates');
    Route::get('/hapusadminumkmcon/{id}','PelakuUsahaController@hapus');


    //Controller untuk tabel Brand
    Route::get('brandcon','BrandController@index');
    Route::get('tambahbrandcon','BrandController@tambah');
    Route::post('brandconstore','BrandController@create');
    Route::post('updatesbrandcon','BrandController@updates');
    Route::get('/updatebrandcon/{id}','BrandController@update');
    Route::get('/hapusbrandcon/{id}','BrandController@hapus');
    
    //Controller untuk tabel Satuan
    Route::get('satuancon','SatuanController@index');
    Route::get('tambahsatuancon','SatuanController@tambah');
    Route::post('satuanconstore','SatuanController@create');
    Route::post('updatessatuancon','SatuanController@updates');
    Route::get('/updatesatuancon/{id}','SatuanController@update');
    Route::get('/hapussatuancon/{id}','SatuanController@hapus');

    //Controller untuk tabel Promosi
    Route::get('promosicon','PromosiController@index');
    Route::get('tambahpromosicon','PromosiController@tambah');
    Route::post('promosiconstore','PromosiController@create');
    Route::post('updatespromosicon','PromosiController@updates');
    Route::get('/updatepromosicon/{id}','PromosiController@update');
    Route::get('/hapuspromosicon/{id}','PromosiController@hapus');

    //Controller untuk tabel penjualan produk pelaku usaha
    Route::get('projualcon','PenjualanPelakuUsahaProdukController@index');
    Route::get('tambahprojualcon','PenjualanPelakuUsahaProdukController@tambah');
    Route::post('projualconstore','PenjualanPelakuUsahaProdukController@create');
    Route::post('updatesprojualcon','PenjualanPelakuUsahaProdukController@updates');
    Route::get('/updateprojualcon/{id}','PenjualanPelakuUsahaProdukController@update');
    Route::get('/hapusprojualcon/{id}','PenjualanPelakuUsahaProdukController@hapus');

    //Controller untuk tabel penjualan pelaku usaha status
    Route::get('penjualanstatuscon','PenjualanPelakuUsahaStatusController@index');
    Route::get('tambahpenjualanstatuscon','PenjualanPelakuUsahaStatusController@tambah');
    Route::post('penjualanstatusconstore','PenjualanPelakuUsahaStatusController@create');
    Route::post('updatespenjualanstatuscon','PenjualanPelakuUsahaStatusController@updates');
    Route::get('/updatepenjualanstatuscon/{id}','PenjualanPelakuUsahaStatusController@update');
    Route::get('/hapuspenjualanstatuscon/{id}','PenjualanPelakuUsahaStatusController@hapus');

    //Controller untuk tabel Kurir
    Route::get('kurircon','KurirController@index');
    Route::get('tambahkurircon','KurirController@tambah');
    Route::post('kurirconstore','KurirController@create');
    Route::post('updateskurircon','KurirController@updates');
    Route::get('/updatekurircon/{id}','KurirController@update');
    Route::get('/hapuskurircon/{id}','KurirController@hapus');

    //Controller untuk tabel Pengiriman
    Route::get('pengirimancon','PengirimanController@index');
    Route::get('tambahpengirimancon','PengirimanController@tambah');
    Route::post('pengirimanconstore','PengirimanController@create');
    Route::post('updatespengirimancon','PengirimanController@updates');
    Route::get('/updatepengirimancon/{id}','PengirimanController@update');
    Route::get('/hapuspengirimancon/{id}','PengirimanController@hapus');

    //Controller untuk tabel Produk Jual
    Route::get('produkjualcon','ProdukJualController@index');
    Route::get('tambahprodukjualcon','ProdukJualController@tambah');
    Route::post('produkjualconstore','ProdukJualController@create');
    Route::get('/updateprodukjualcon/{id}','ProdukJualController@update');
    Route::post('updatesprodukjualcon','ProdukJualController@updates');
    Route::get('/hapusprodukjualcon/{id}','ProdukJualController@hapus');

    //Controller untuk tabel Produk
    Route::get('produkcon','ProdukController@index');
    Route::get('tambahprodukcon','ProdukController@tambah');
    Route::post('produkconstore','ProdukController@create');
    Route::post('updatesprodukcon','ProdukController@updates');
    Route::get('/updateprodukcon/{id}','ProdukController@update');
    Route::get('/hapusprodukcon/{id}','ProdukController@hapus');

     //Controller untuk tabel TempatUsaha
     Route::get('tempatusahacon','TempatUsahaController@index');
     Route::get('tambahtempatusahacon','TempatUsahaController@tambah');
     Route::post('tempatusahaconstore','TempatUsahaController@create');
     Route::post('updatestempatusahacon','TempatUsahaController@updates');
     Route::get('/updatetempatusahacon/{id}','TempatUsahaController@update');
     Route::get('/hapustempatusahacon/{id}','TempatUsahaController@hapus');
 
});

/*
Route::group(['prefix' => 'umkm'], function(){
    Route::get('umkmbrand',function(){return view('umkmtable.umkmbrand'); });
});
*/

Route::group(['prefix' => 'email'], function(){
    Route::get('inbox', function () { return view('pages.email.inbox'); });
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});

Route::group(['prefix' => 'apps'], function(){
    Route::get('chat', function () { return view('pages.apps.chat'); });
    Route::get('calendar', function () { return view('pages.apps.calendar'); });
});

Route::group(['prefix' => 'ui-components'], function(){
    Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
    Route::get('badges', function () { return view('pages.ui-components.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
    Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
    Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
    Route::get('cards', function () { return view('pages.ui-components.cards'); });
    Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
    Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
    Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
    Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
    Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
    Route::get('modal', function () { return view('pages.ui-components.modal'); });
    Route::get('navs', function () { return view('pages.ui-components.navs'); });
    Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
    Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
    Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
    Route::get('progress', function () { return view('pages.ui-components.progress'); });
    Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
    Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
    Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
    Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
    Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
    Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('pages.forms.editors'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts'], function(){
    Route::get('apex', function () { return view('pages.charts.apex'); });
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('morrisjs', function () { return view('pages.charts.morrisjs'); });
    Route::get('peity', function () { return view('pages.charts.peity'); });
    Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
});

Route::group(['prefix' => 'tables'], function(){
    Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
    Route::get('data-table', function () { return view('pages.tables.data-table'); });
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general'], function(){
    Route::get('blank-page', function () { return view('pages.general.blank-page'); });
    Route::get('faq', function () { return view('pages.general.faq'); });
    Route::get('invoice', function () { return view('pages.general.invoice'); });
    Route::get('profile', function () { return view('pages.general.profile'); });
    Route::get('pricing', function () { return view('pages.general.pricing'); });
    Route::get('timeline', function () { return view('pages.general.timeline'); });
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
});

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('pages.error.404'); });
    Route::get('500', function () { return view('pages.error.500'); });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');
