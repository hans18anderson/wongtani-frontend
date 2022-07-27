<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanPelakuUsahaStatusController extends Controller
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
        $data_penjualanstatus = \App\PenjualanPelakuUsahaStatus::all();


        //dd($data2);\
        return view('umkmtable.umkmpenjualanstatus',['data_penjualanstatus'=>$data_penjualanstatus]);
    }

    const MODEL = "App\PenjualanPelakuUsahaStatus";

    use RESTActions;
    public function tambah()
    {
        $data_jual = \App\PenjualanStatusKategori::all();
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
        return view('umkmtable.umkmtambahpenjualanstatus',['pelaku_data'=>$pelaku_data, 'jual_data'=>$jual_data ]);
    }
    public function create(Request $request)
    {
        DB::table('penjualan_pelaku_usaha_status')->insert([
            'tanggal' => $request->jumlah,
            'keterangan' => $request->harga,
            'status' => $request->catatan,
            'penjualan_pelaku_usaha_id' => $request->id1,
            'penjualan_status_kategori_id' => $request->id2
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/penjualanstatuscon');
    }
    public function update($id)
    {
        $data = \App\PenjualanPelakuUsahaStatus::find($id);
        return view('umkmtable.umkmupdatepenjualanstatus',['data'=>$data]);
    }

    public function updates(Request $request)
    {
        DB::table('penjualan_pelaku_usaha_status')->where('id',$request->id5)->update([
            'tanggal' => $request->jumlah,
            'keterangan' => $request->harga,
            'status' => $request->catatan,
            'penjualan_pelaku_usaha_id' => $request->id1,
            'penjualan_status_kategori_id' => $request->id2
        ]);
        return redirect('/control/penjualanstatuscon');
    }
    public function hapus($id)
    {
	    DB::table('penjualan_pelaku_usaha_status')->where('id',$id)->delete();
		
        // alihkan halaman ke halaman pegawai
        return redirect('/control/penjualanstatuscon');
    }
}
