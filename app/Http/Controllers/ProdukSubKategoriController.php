<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukSubKategoriController extends Controller
{
    

    // public function indexList()
    // {
    //     $data = DB::table('v_simpang')->orderBy('id')->get();
         
    //     return response()->json($data);
    // }

    // public function GetData($simpang_id)
    // {
    //     $data = DB::table('v_simpang')->where('id',$simpang_id)->first();
    //     //return response()->json($data);
    //     return response()->json($data);
    // }

    public function index()
    {
        $data_sub_kategori_produk = \App\ProdukSubKategori::all();
        //dd($data2);
        return view('admin.produk.subkategoriproduk.table',['data_sub_kategori_produk' => $data_sub_kategori_produk]) ;
    }

    const MODEL = "App\ProdukSubKategori";

    public function tambah()
    {
        $data_sub_produk = \App\ProdukKategori::all();
        $produk_sub_data = [];
        foreach($data_sub_produk as $produk){
            $produk_sub_data[] = $produk;
        }
        // memanggil view tambah
        return view('admin.produk.subkategoriproduk.tambah',['produk_data'=>$produk_sub_data]);
        
    }
    
    public function create(Request $request)
    {
        
        DB::table('produk_sub_kategori')->insert([
            'nama' => $request->nama,
            'produk_kategori_id' => $request->id2
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminProduk/subkatprocon');
        /*
        \App\Produk::create($request->all());
        return redirect('/control/produkcon');
        */

    }

    public function update($id)
    {
        $data_sub_produk = \App\ProdukKategori::all();
        $produk_sub_data = [];
        foreach($data_sub_produk as $produk){
            $produk_sub_data[] = $produk;
        }
        $data = \App\ProdukSubKategori::find($id);
        return view('admin.produk.subkategoriproduk.update',['data'=>$data, 'data2'=>$produk_sub_data]);
    }
    public function updates(Request $request)
    {
        DB::table('produk_sub_kategori')->where('id',$request->id5)->update([
            'nama' => $request->nama,
            'produk_kategori_id' => $request->id2
        ]);
        return redirect('/AdminProduk/subkatprocon');
    }

    public function hapus($id)
    {
        DB::table('produk_sub_kategori')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminProduk/subkatprocon');
    }

    use RESTActions;
}
