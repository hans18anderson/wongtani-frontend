<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LahanJenisController extends Controller
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
        $data_lokasi = \App\LahanJenis::all();
        return view('admin.lokasi.jenislahan.table',['data_lokasi'=>$data_lokasi]);
    }

    const MODEL = "App\LahanJenis";

    public function tambah()
    {
        return view('admin.lokasi.jenislahan.tambah');
    
    }   

    public function create(Request $request)
    {
        DB::table('lahan_jenis')->insert([
            'nama' => $request->nama
        ]);
        return redirect('/AdminLokasi/lahcon');
    }

    public function update($id)
    {
        $data = \App\LahanJenis::find($id);
        return view('admin.lokasi.jenislahan.update',['data'=>$data]);
    }

    public function updates(Request $request)
    {
        DB::table('lahan_jenis')->where('id',$request->id4)->update([
            'nama' => $request->nama
        ]);
        return redirect('/AdminLokasi/lahcon');
    }

    public function hapus($id)
    {
        DB::table('lahan_jenis')->where('id',$id)->delete();
        return redirect('/AdminLokasi/lahcon');
    }

    use RESTActions;
}
