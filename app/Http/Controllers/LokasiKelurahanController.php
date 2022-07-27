<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiKelurahanController extends Controller
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
        $data_lokasi = \App\LokasiKelurahan::all();
        return view('admin.lokasi.kelurahan.table',['data_lokasi'=>$data_lokasi]);
    }

    const MODEL = "App\LokasiKelurahan";

    public function tambah()
    {
        $data_kec = \App\LokasiKecamatan::all();

        $kec_data = [];
        foreach($data_kec as $kec){
            $kec_data[] = $kec;
        }

        return view('admin.lokasi.kelurahan.tambah',['data' => $kec_data]);
    
    }   

    public function create(Request $request)
    {
        DB::table('lokasi_kelurahan')->insert([
            'nama' => $request->nama,
            'lang' => $request->lang,
            'lat' => $request->lat,
            'area' => $request->area,
            'lokasi_kecamatan_id' => $request->id2
        ]);
        return redirect('/AdminLokasi/kelcon');
    }

    public function update($id)
    {
        $data_kec = \App\LokasiKecamatan::all();

        $kec_data = [];
        foreach($data_kec as $kec){
            $kec_data[] = $kec;
        }

        $data = \App\LokasiKelurahan::find($id);
        return view('admin.lokasi.kelurahan.update',['data'=>$data,'kecdata'=>$kec_data]);
    }

    public function updates(Request $request)
    {
        DB::table('lokasi_kelurahan')->where('id',$request->id4)->update([
            'nama' => $request->nama,
            'lang' => $request->lang,
            'lat' => $request->lat,
            'area' => $request->area,
            'lokasi_kecamatan_id' => $request->id2
        ]);
        return redirect('/AdminLokasi/kelcon');
    }

    public function hapus($id)
    {
        DB::table('lokasi_kelurahan')->where('id',$id)->delete();
        return redirect('/AdminLokasi/kelcon');
    }

    use RESTActions;
}
