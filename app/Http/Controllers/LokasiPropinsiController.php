<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiPropinsiController extends Controller
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
        $data_lokasi = \App\LokasiPropinsi::all();
        return view('admin.lokasi.provinsi.table',['data_lokasi'=>$data_lokasi]);
    }

    const MODEL = "App\LokasiPropinsi";

    public function tambah()
    {
        return view('admin.lokasi.provinsi.tambah');
    
    }
    public function create(Request $request)
    {
        DB::table('lokasi_propinsi')->insert([
            'nama' => $request->nama
        ]);
        return redirect('/AdminLokasi/procon');
    }
    public function update($id)
    {
        $data = \App\LokasiPropinsi::find($id);
        return view('admin.lokasi.provinsi.update',['data'=>$data]);
    }
    public function updates(Request $request)
    {
        DB::table('lokasi_propinsi')->where('id',$request->id5)->update([
            'nama' => $request->nama
        ]);
        return redirect('/AdminLokasi/procon');
    }
    public function hapus($id)
    {
        DB::table('lokasi_propinsi')->where('id',$id)->delete();
        return redirect('/AdminLokasi/procon');
    }

    use RESTActions;
}
