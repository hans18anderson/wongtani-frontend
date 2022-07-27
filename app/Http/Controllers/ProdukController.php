<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data_produk = \App\Produk::all();


        //dd($data2);\
        return view('umkmtable.umkmproduk',['data_produk'=>$data_produk]);
    }
    public function tambah()
    {
        $data_sub = \App\ProdukSubSubKategori::all();
        $data_pelaku = \App\PelakuUsaha::all();
        $data_satuan = \App\Satuan::all();
        $data_brand = \App\Brand::all();

        $sub_data = [];
        foreach($data_sub as $sub){
            $sub_data[] = $sub;
        }

        $pelaku_data = [];
        foreach($data_pelaku as $pelaku){
            $pelaku_data[] = $pelaku;
        }

        $satuan_data = [];
        foreach($data_satuan as $satuan){
            $satuan_data[] = $satuan;
        }
    
        $brand_data = [];
        foreach($data_brand as $brand){
            $brand_data[] = $brand;
        }
        // memanggil view tambah
        return view('umkmtable.umkmtambahproduk',['sub_data'=>$sub_data,'pelaku_data'=>$pelaku_data, 'satuan_data'=>$satuan_data,'brand_data'=>$brand_data ]);
    
    }
    // method untuk insert data ke table pegawai
    public function create(Request $request)
    {
        DB::table('produk')->insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'produk_sub_sub_kategori_id' => $request->id1,
            'pelaku_usaha_id' => $request->id2,
            'satuan_id' => $request->id3,
            'brand_id' => $request->id4
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/produkcon');
        /*
        \App\Produk::create($request->all());
        return redirect('/control/produkcon');
        */

    }

    public function update($id)
    {
        $data_sub = \App\ProdukSubSubKategori::all();
        $data_pelaku = \App\PelakuUsaha::all();
        $data_satuan = \App\Satuan::all();
        $data_brand = \App\Brand::all();

        $sub_data = [];
        foreach($data_sub as $sub){
            $sub_data[] = $sub;
        }

        $pelaku_data = [];
        foreach($data_pelaku as $pelaku){
            $pelaku_data[] = $pelaku;
        }

        $satuan_data = [];
        foreach($data_satuan as $satuan){
            $satuan_data[] = $satuan;
        }
    
        $brand_data = [];
        foreach($data_brand as $brand){
            $brand_data[] = $brand;
        }
        $data = \App\Produk::find($id);
        return view('umkmtable.umkmupdateproduk',['data'=>$data, 'subdata'=>$sub_data, 'pelakudata'=>$pelaku_data,'satuandata'=>$satuan_data,'branddata'=>$brand_data]);
    }

    public function updates(Request $request)
    {
        DB::table('produk')->where('id',$request->id5)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'produk_sub_sub_kategori_id' => $request->id1,
            'pelaku_usaha_id' => $request->id2,
            'satuan_id' => $request->id3,
            'brand_id' => $request->id4
        ]);
        return redirect('/control/produkcon');
    }
    // method untuk hapus data pegawai
public function hapus($id)
{
	DB::table('produk')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/control/produkcon');
}

    use RESTActions;
}
