<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SatuanController extends Controller
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
        $data_satuan = \App\Satuan::all();


        //dd($data2);\
        return view('umkmtable.umkmsatuan',['data_satuan'=>$data_satuan]);
    }

    const MODEL = "App\Satuan";

    public function tambah()
    {
        $data_pelaku = \App\PelakuUsaha::all();

        $pelaku_data = [];
        foreach($data_pelaku as $pelaku){
            $pelaku_data[] = $pelaku;
        }
        // memanggil view tambah
        return view('umkmtable.umkmtambahsatuan',['pelaku_data'=>$pelaku_data]);
    }
    public function create(Request $request)
    {
        DB::table('satuan')->insert([
            'nama' => $request->nama,
            'pelaku_usaha_id' => $request->id1
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/satuancon');

    }
    use RESTActions;
    public function update($id)
    {
        $data_pelaku = \App\PelakuUsaha::all();
        $data2 = [];
        foreach($data_pelaku as $pelaku){
            $data2[] = $pelaku;
        }
        $data = \App\Satuan::find($id);
        return view('umkmtable.umkmupdatesatuan',['data'=>$data , 'data2'=>$data2]);
    }

    public function updates(Request $request)
    {
        DB::table('satuan')->where('id',$request->id5)->update([
            'nama' => $request->nama,
            'pelaku_usaha_id' => $request->id2
        ]);
        return redirect('/control/satuancon');
    }
    public function hapus($id)
    {
	    DB::table('satuan')->where('id',$id)->delete();
		
        // alihkan halaman ke halaman pegawai
        return redirect('/control/satuancon');
    }
}
