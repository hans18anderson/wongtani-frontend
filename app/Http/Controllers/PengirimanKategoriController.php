<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengirimanKategoriController extends Controller
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
        $data_transaksi = \App\PengirimanKategori::all();
        return view('admin.transaksi.kategoripengiriman.table',['data_transaksi'=>$data_transaksi]);
    }

    const MODEL = "App\PengirimanKategori";

    public function tambah()
    {
        return view('admin.transaksi.kategoripengiriman.tambah');
    
    }   

    public function create(Request $request)
    {
        DB::table('pengiriman_kategori')->insert([
            'nama' => $request->nama
        ]);
        return redirect('/AdminTransaksi/katpengcon');
    }

    public function update($id)
    {
        $data = \App\PengirimanKategori::find($id);
        return view('admin.transaksi.kategoripengiriman.update',['data'=>$data]);
    }

    public function updates(Request $request)
    {
        DB::table('pengiriman_kategori')->where('id',$request->id4)->update([
            'nama' => $request->nama
        ]);
        return redirect('/AdminTransaksi/katpengcon');
    }

    public function hapus($id)
    {
        DB::table('pengiriman_kategori')->where('id',$id)->delete();
        return redirect('/AdminTransaksi/katpengcon');
    }

    use RESTActions;
}
