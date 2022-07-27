<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsumenController extends Controller
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
        $data_konsumen = \App\Konsumen::all();
        //dd($data2);
        return view('admin.user.konsumen.table',['data_konsumen' => $data_konsumen]);
    }

    const MODEL = "App\Konsumen";

    public function tambah()
    {
        $data_kelurahan = \App\LokasiKelurahan::all();
        $kelurahan = [];
        foreach($data_kelurahan as $data){
            $kelurahan[] = $data;
        }
        // memanggil view tambah
        return view('admin.user.konsumen.tambah',['kelurahan'=>$kelurahan]);
    }

    public function create(Request $request)
    {
        
        DB::table('konsumen')->insert([
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_KTP' => $request->no_ktp,
            'email' => $request->email,
            'nomor_telp' => $request->no_telp,
            'status' => $request->status,
            'kelurahan_id' => $request->id2
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminUser/koncon');
        /*
        \App\Produk::create($request->all());
        return redirect('/control/produkcon');
        */
    }

    public function update($id)
    {
        $data_kelurahan = \App\LokasiKelurahan::all();
        $kelurahan = [];
        foreach($data_kelurahan as $data){
            $kelurahan[] = $data;
        }
        $data = \App\Konsumen::find($id);
        return view('admin.user.konsumen.update',['data'=>$data, 'data2'=>$kelurahan]);
    }
    public function updates(Request $request)
    {
        DB::table('konsumen')->where('id',$request->id5)->update([
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_KTP' => $request->no_ktp,
            'email' => $request->email,
            'nomor_telp' => $request->no_telp,
            'status' => $request->status,
            'kelurahan_id' => $request->id2
        ]);
        return redirect('/AdminUser/koncon');
    }

    public function hapus($id)
    {
        DB::table('konsumen')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminUser/koncon');
    }

    use RESTActions;
}
