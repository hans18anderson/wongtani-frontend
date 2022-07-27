<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KurirController extends Controller
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
        $data_kurir = \App\Kurir::all();


        //dd($data2);\
        return view('umkmtable.umkmkurir',['data_kurir'=>$data_kurir]);
    }

    const MODEL = "App\Kurir";

    use RESTActions;

    public function tambah()
    {
        $data_pelaku = \App\PelakuUsaha::all();
        $data_status = \App\PenjualanPelakuUsahaStatus::all();

        $pelaku_data = [];
        foreach($data_pelaku as $pelaku){
            $pelaku_data[] = $pelaku;
        }

        $status_data = [];
        foreach($data_status as $status){
            $status_data[] = $status;
        }
        // memanggil view tambah
        return view('umkmtable.umkmtambahkurir',['pelaku_data'=>$pelaku_data, 'status_data'=>$status_data ]);
    }
    public function create(Request $request)
    {
        DB::table('kurir')->insert([
            'nama' => $request->nama,
            'status' => $request->id2,
            'pelaku_usaha_id' => $request->id1
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/kurircon');
    }
    public function update($id)
    {
        $data_pelaku = \App\PelakuUsaha::all();
        $data2 = [];
        foreach($data_pelaku as $pelaku){
            $data2[] = $pelaku;
        }
        $data = \App\Kurir::find($id);
        return view('umkmtable.umkmupdatekurir',['data'=>$data,'data2'=>$data2]);
    }

    public function updates(Request $request)
    {
        DB::table('kurir')->where('id',$request->id5)->update([
            'nama' => $request->nama,
            'status' => $request->id1,
            'pelaku_usaha_id' => $request->id2
        ]);
        return redirect('/control/kurircon');
    }
    public function hapus($id)
    {
	    DB::table('kurir')->where('id',$id)->delete();
		
        // alihkan halaman ke halaman pegawai
        return redirect('/control/kurircon');
    }
}
