<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PelakuUsahaController extends Controller
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
        $data_pelaku = \App\PelakuUsaha::all();


        //dd($data2);\
        return view('admin.admintabelumkm',['data_pelaku'=>$data_pelaku]);
    }

    public function tambah()
    {
        $data_kelurahan = \App\LokasiKelurahan::all();
        $data_koordinator = \App\PelakuUsahaKoordinator::all();

        $kelurahan_data = [];
        foreach($data_kelurahan as $kel){
            $kelurahan_data[] = $kel;
        }

        $koordinator_data = [];
        foreach($data_koordinator as $koor){
            $koordinator_data[] = $koor;
        }
        // memanggil view tambah
        return view('admin.tambahadmintabelumkm',['kel_data' => $kelurahan_data, 'koor_data'=>$koordinator_data]);
    
    }
    public function create(Request $request)
    {
        DB::table('pelaku_usaha')->insert([
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_KTP' => $request->nomorktp,
            'email' => $request->email,
            'nomor_telp' => $request->nomortelp,
            'deskripsi' => $request->deskripsi ,
            'catatan' => $request->catatan,
            'nama_cp' => $request->namacp,
            'nomor_telp_cp' => $request->nomortelpcp,
            'x' => $request->x,
            'y' => $request->y,
            'status' => $request->id1,
            'lokasi_kelurahan_id' => $request->id2,
            'pelaku_usaha_koordinator_id' => $request->id3
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/adminumkmcon');
        /*
        \App\Produk::create($request->all());
        return redirect('/control/produkcon');
        */
    }
    public function update($id)
    {
        $data_kelurahan = \App\LokasiKelurahan::all();
        $data_koordinator = \App\PelakuUsahaKoordinator::all();

        $kelurahan_data = [];
        foreach($data_kelurahan as $kel){
            $kelurahan_data[] = $kel;
        }

        $koordinator_data = [];
        foreach($data_koordinator as $koor){
            $koordinator_data[] = $koor;
        }
        $data = \App\PelakuUsaha::find($id);
        return view('admin.updateadmintabelumkm',['data'=>$data,'kelurahandata'=>$kelurahan_data,'koordinatordata'=>$koordinator_data]);
    }
    public function updates(Request $request)
    {
        DB::table('pelaku_usaha')->where('id',$request->id4)->update([
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_KTP' => $request->nomorktp,
            'email' => $request->email,
            'nomor_telp' => $request->nomortelp,
            'deskripsi' => $request->deskripsi ,
            'catatan' => $request->catatan,
            'nama_cp' => $request->namacp,
            'nomor_telp_cp' => $request->nomortelpcp,
            'x' => $request->x,
            'y' => $request->y,
            'status' => $request->id1,
            'lokasi_kelurahan_id' => $request->id2,
            'pelaku_usaha_koordinator_id' => $request->id3
        ]);
        return redirect('/control/adminumkmcon');
    }

    public function hapus($id)
    {
        DB::table('pelaku_usaha')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/control/adminumkmcon');
    }

    const MODEL = "App\PelakuUsaha";

    use RESTActions;
}
