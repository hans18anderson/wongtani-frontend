<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $data_brand = \App\Brand::all();


        //dd($data2);\
        return view('umkmtable.umkmbrand',['data_brand'=>$data_brand]);
    }
    public function tambah()
    {
        $data_pelaku = \App\PelakuUsaha::all();

        $pelaku_data = [];
        foreach($data_pelaku as $pelaku){
            $pelaku_data[] = $pelaku;
        }
        // memanggil view tambah
        return view('umkmtable.umkmtambahbrand',['pelaku_data'=>$pelaku_data]);
    }
    public function create(Request $request)
    {
        DB::table('brand')->insert([
            'nama' => $request->nama,
            'pelaku_usaha_id' => $request->id1
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/brandcon');

    }
    public function update($id)
    {
        $data_pelaku = \App\PelakuUsaha::all();
        $data2 = [];
        foreach($data_pelaku as $pelaku){
            $data2[] = $pelaku;
        }
        $data = \App\Brand::find($id);
        return view('umkmtable.umkmupdatebrand',['data'=>$data , 'data2' => $data2]);
    }

    public function updates(Request $request)
    {
        DB::table('brand')->where('id',$request->id5)->update([
            'nama' => $request->nama,
            'pelaku_usaha_id' => $request->id2
        ]);
        return redirect('/control/brandcon');
    }
    public function hapus($id)
    {
	    DB::table('brand')->where('id',$id)->delete();
		
        // alihkan halaman ke halaman pegawai
        return redirect('/control/brandcon');
    }
}