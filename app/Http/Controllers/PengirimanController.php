<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
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
        $data_pengiriman = \App\Pengiriman::all();


        //dd($data2);\
        return view('umkmtable.umkmpengiriman',['data_pengiriman'=>$data_pengiriman]);
    }


    const MODEL = "App\Pengiriman";

    use RESTActions;
    public function tambah()
    {
        $data_pelaku = \App\PelakuUsaha::all();
        $data_kurir = \App\Kurir::all();
        $data_Pengiriman_kategori = \App\PengirimanKategori::all();

        $pelaku_data = [];
        foreach($data_pelaku as $pelaku){
            $pelaku_data[] = $pelaku;
        }

        $kurir_data = [];
        foreach($data_kurir as $kurir){
            $kurir_data[] = $kurir;
        }

        $kategori_data = [];
        foreach($data_Pengiriman_kategori as $kategori){
            $kategori_data[] = $kategori;
        }
        // memanggil view tambah
        return view('umkmtable.umkmtambahpengiriman',['pelaku_data'=>$pelaku_data, 'kurir_data'=>$kurir_data, 'kategori_data' => $kategori_data ]);
    }
    public function create(Request $request)
    {
        DB::table('pengiriman')->insert([
            'tarif' => $request->nama,
            'kurir_id' => $request->id1,
            'pengiriman_kategori_id' => $request->id2,
            'pelaku_usaha_id' => $request->id3
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/pengirimancon');
    }
    public function update($id)
    {
        $data_pelaku = \App\PelakuUsaha::all();
        $data_kurir = \App\Kurir::all();
        $data_Pengiriman_kategori = \App\PengirimanKategori::all();

        $pelaku_data = [];
        foreach($data_pelaku as $pelaku){
            $pelaku_data[] = $pelaku;
        }

        $kurir_data = [];
        foreach($data_kurir as $kurir){
            $kurir_data[] = $kurir;
        }

        $kategori_data = [];
        foreach($data_Pengiriman_kategori as $kategori){
            $kategori_data[] = $kategori;
        }
        $data = \App\Pengiriman::find($id);
        return view('umkmtable.umkmupdatepengiriman',['data'=>$data,'pelakudata'=>$pelaku_data,'kurirdata'=>$kurir_data,'kategoridata'=>$kategori_data]);
    }

    public function updates(Request $request)
    {
        DB::table('pengiriman')->where('id',$request->id5)->update([
            'tarif' => $request->nama,
            'kurir_id' => $request->id1,
            'pengiriman_kategori_id' => $request->id2,
            'pelaku_usaha_id' => $request->id3
        ]);
        return redirect('/control/pengirimancon');
    }
    public function hapus($id)
    {
	    DB::table('pengiriman')->where('id',$id)->delete();
		
        // alihkan halaman ke halaman pegawai
        return redirect('/control/pengirimancon');
    }
}
