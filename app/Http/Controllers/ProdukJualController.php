<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProdukJualController extends Controller
{
    

    public function produkJualList()
    {
        $data = DB::table('v_produk_jual')->get();
         
        return response()->json($data);
    }
    
    public function index()
    {
        $data_produk_jual = \App\produk_jual::all();
        //dd($data2);
        return view('umkmtable.umkmprodukjual',['data_produk_jual' => $data_produk_jual]) ;
    }
    public function tambah()
    {
        $data_produk = \App\Produk::all();
        $produk_data = [];
        foreach($data_produk as $produk){
            $produk_data[] = $produk;
        }
    
        // memanggil view tambah
        return view('umkmtable.umkmtambahprodukjual',['produk_data'=>$produk_data]);
        
    }
    
    public function create(Request $request)
    {
        DB::table('produk_jual')->insert([
            'harga' => $request->harga,
            'stok' => $request->stok,
            'produk_id' => $request->id1
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/produkjualcon');
        /*
        \App\Produk::create($request->all());
        return redirect('/control/produkcon');
        */

    }
    public function update($id)
    {
        $data_produk = \App\Produk::all();
        $produk_data = [];
        foreach($data_produk as $produk){
            $produk_data[] = $produk;
        }
        $data = \App\produk_jual::find($id);
        return view('umkmtable.umkmupdateprodukjual',['data'=>$data,'data2'=>$produk_data]);
    }
    public function updates(Request $request)
    {
        DB::table('produk_jual')->where('id',$request->id2)->update([
            'harga' => $request->harga,
            'stok' => $request->stok,
            'produk_id' => $request->id1
        ]);
        return redirect('/control/produkjualcon');
    }

    public function hapus($id)
    {
        DB::table('produk_jual')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/control/produkjualcon');
    }
    
    
    // public function GetData($simpang_id)
    // {
    //     $data = DB::table('v_simpang')->where('id',$simpang_id)->first();
    //     //return response()->json($data);
    //     return response()->json($data);
    // }

    //
    const MODEL = "App\TanamProduk";

    
}
