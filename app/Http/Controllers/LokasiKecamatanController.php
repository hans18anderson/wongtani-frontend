<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiKecamatanController extends Controller
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
        $data_lokasi = \App\LokasiKecamatan::all();
        return view('admin.lokasi.kecamatan.table',['data_lokasi'=>$data_lokasi]);
    }

    const MODEL = "App\LokasiKecamatan";

    public function tambah()
    {
        $data_kota = \App\lokasiKotakab::all();

        $kota_data = [];
        foreach($data_kota as $kota){
            $kota_data[] = $kota;
        }

        return view('admin.lokasi.kecamatan.tambah',['data' => $kota_data]);
    
    }   

    public function create(Request $request)
    {
        DB::table('lokasi_kecamatan')->insert([
            'nama' => $request->nama,
            'lang' => $request->lang,
            'lat' => $request->lat,
            'area' => $request->area,
            'kodepos' => $request->kodepos,
            'lokasi_kotakab_id' => $request->id2
        ]);
        return redirect('/AdminLokasi/keccon');
    }

    public function update($id)
    {
        $data_kota = \App\lokasiKotakab::all();

        $kota_data = [];
        foreach($data_kota as $kota){
            $kota_data[] = $kota;
        }

        $data = \App\LokasiKecamatan::find($id);
        return view('admin.lokasi.kecamatan.update',['data'=>$data,'kotadata'=>$kota_data]);
    }

    public function updates(Request $request)
    {
        DB::table('lokasi_kecamatan')->where('id',$request->id4)->update([
            'nama' => $request->nama,
            'lang' => $request->lang,
            'lat' => $request->lat,
            'area' => $request->area,
            'kodepos' => $request->kodepos,
            'lokasi_kotakab_id' => $request->id2
        ]);
        return redirect('/AdminLokasi/keccon');
    }

    public function hapus($id)
    {
        DB::table('lokasi_kecamatan')->where('id',$id)->delete();
        return redirect('/AdminLokasi/keccon');
    }

    use RESTActions;
}
