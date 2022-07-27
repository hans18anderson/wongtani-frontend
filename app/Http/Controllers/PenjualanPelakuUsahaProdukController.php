<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanPelakuUsahaProdukController extends Controller
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
        $data_projual = \App\PenjualanPelakuUsahaProduk::all();


        //dd($data2);\
        return view('umkmtable.umkmprojual',['data_projual'=>$data_projual]);
    }
    const MODEL = "App\PenjualanPelakuUsahaProduk";

    use RESTActions;
    public function tambah()
    {
        $data_jual = \App\produk_jual::all();
        $data_pelaku = \App\PenjualanPelakuUsaha::all();

        $jual_data = [];
        foreach($data_jual as $jual){
            $jual_data[] = $jual;
        }

        $pelaku_data = [];
        foreach($data_pelaku as $pelaku){
            $pelaku_data[] = $pelaku;
        }
        // memanggil view tambah
        return view('umkmtable.umkmtambahprojual',['pelaku_data'=>$pelaku_data, 'jual_data'=>$jual_data ]);
    }
    public function create(Request $request)
    {
        DB::table('penjualan_pelaku_usaha_produk')->insert([
            'jumlah' => $request->jumlah,
            'harga_jual' => $request->harga,
            'catatan' => $request->catatan,
            'produk_jual_id' => $request->id1,
            'penjualan_pelaku_usaha_id' => $request->id2
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/projualcon');
    }
    public function update($id)
    {
        $data_jual = \App\produk_jual::all();
        $data_pelaku = \App\PenjualanPelakuUsaha::all();

        $jual_data = [];
        foreach($data_jual as $jual){
            $jual_data[] = $jual;
        }

        $pelaku_data = [];
        foreach($data_pelaku as $pelaku){
            $pelaku_data[] = $pelaku;
        }
        $data = \App\PenjualanPelakuUsahaProduk::find($id);
        return view('umkmtable.umkmupdateprojual',['data'=>$data,'jualdata'=>$jual_data,'pelakudata'=>$pelaku_data]);
    }

    public function updates(Request $request)
    {
        DB::table('penjualan_pelaku_usaha_produk')->where('id',$request->id5)->update([
            'jumlah' => $request->jumlah,
            'harga_jual' => $request->harga,
            'catatan' => $request->catatan,
            'produk_jual_id' => $request->id1,
            'penjualan_pelaku_usaha_id' => $request->id2
        ]);
        return redirect('/control/projualcon');
    }
    public function hapus($id)
    {
	    DB::table('penjualan_pelaku_usaha_produk')->where('id',$id)->delete();
		
        // alihkan halaman ke halaman pegawai
        return redirect('/control/projualcon');
    }
}
