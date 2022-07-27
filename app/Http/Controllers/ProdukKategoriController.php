<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukKategoriController extends Controller
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
        $data_kategori_produk = \App\ProdukKategori::all();
        //dd($data2);
        return view('admin.produk.kategoriproduk.table',['data_kategori_produk' => $data_kategori_produk]) ;
    }

    const MODEL = "App\ProdukKategori";

    public function tambah()
    {
        // memanggil view tambah
        return view('admin.produk.kategoriproduk.tambah');
        
    }
    
    public function create(Request $request)
    {
        DB::table('produk_kategori')->insert([
            'nama' => $request->nama
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminProduk/katprocon');
        /*
        \App\Produk::create($request->all());
        return redirect('/control/produkcon');
        */

    }

    public function update($id)
    {
        $data = \App\ProdukKategori::find($id);
        return view('admin.produk.kategoriproduk.update',['data'=>$data]);
    }
    public function updates(Request $request)
    {
        DB::table('produk_kategori')->where('id',$request->id5)->update([
            'nama' => $request->nama
        ]);
        return redirect('/AdminProduk/katprocon');
    }

    public function hapus($id)
    {
        DB::table('produk_kategori')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminProduk/katprocon');
    }

    use RESTActions;
}
