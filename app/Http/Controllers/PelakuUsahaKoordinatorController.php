<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelakuUsahaKoordinatorController extends Controller
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
        $data_pelaku = \App\PelakuUsahaKoordinator::all();


        //dd($data2);\
        return view('admin.user.pelakuusahakoordinator.table',['data_pelaku'=>$data_pelaku]);
    }

    const MODEL = "App\PelakuUsahaKoordinator";

    public function tambah()
    {
        $data_kelurahan = \App\LokasiKelurahan::all();

        $kelurahan_data = [];
        foreach($data_kelurahan as $kel){
            $kelurahan_data[] = $kel;
        }
        // memanggil view tambah
        return view('admin.user.pelakuusahakoordinator.tambah',['kel_data' => $kelurahan_data]);
    
    }

    public function create(Request $request)
    {
        DB::table('pelaku_usaha_koordinator')->insert([
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
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminUser/peluscon');
        /*
        \App\Produk::create($request->all());
        return redirect('/control/produkcon');
        */
    }
    public function update($id)
    {
        $data_kelurahan = \App\LokasiKelurahan::all();

        $kelurahan_data = [];
        foreach($data_kelurahan as $kel){
            $kelurahan_data[] = $kel;
        }
        $data = \App\PelakuUsahaKoordinator::find($id);
        return view('admin.user.pelakuusahakoordinator.update',['data'=>$data,'kelurahandata'=>$kelurahan_data]);
    }
    public function updates(Request $request)
    {
        DB::table('pelaku_usaha_koordinator')->where('id',$request->id4)->update([
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
            'lokasi_kelurahan_id' => $request->id2
        ]);
        return redirect('/AdminUser/peluscon');
    }

    public function hapus($id)
    {
        DB::table('pelaku_usaha_koordinator')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminUser/peluscon');
    }

    use RESTActions;
}
