<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiKotakabController extends Controller
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
        $data_lokasi = \App\LokasiKotakab::all();
        return view('admin.lokasi.kabupatenkota.table',['data_lokasi'=>$data_lokasi]);
    }

    const MODEL = "App\LokasiKotakab";

    public function tambah()
    {
        $data_provinsi = \App\LokasiPropinsi::all();

        $provinsi_data = [];
        foreach($data_provinsi as $prof){
            $provinsi_data[] = $prof;
        }

        return view('admin.lokasi.kabupatenkota.tambah',['data' => $provinsi_data]);
    
    }

    public function create(Request $request)
    {
        DB::table('lokasi_kotakab')->insert([
            'nama' => $request->nama,
            'status' => $request->status,
            'lokasi_propinsi_id' => $request->id2
        ]);
        return redirect('/AdminLokasi/kabkotcon');
    }

    public function update($id)
    {
        $data_provinsi = \App\LokasiPropinsi::all();

        $provinsi_data = [];
        foreach($data_provinsi as $prof){
            $provinsi_data[] = $prof;
        }

        $data = \App\LokasiKotakab::find($id);
        return view('admin.lokasi.kabupatenkota.update',['data'=>$data,'profdata'=>$provinsi_data]);
    }

    public function updates(Request $request)
    {
        DB::table('lokasi_kotakab')->where('id',$request->id4)->update([
            'nama' => $request->nama,
            'status' => $request->status,
            'lokasi_propinsi_id' => $request->id2
        ]);
        return redirect('/AdminLokasi/kabkotcon');
    }

    public function hapus($id)
    {
        DB::table('lokasi_kotakab')->where('id',$id)->delete();
        return redirect('/AdminLokasi/kabkotcon');
    }

    use RESTActions;
}
