<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TempatUsahaController extends Controller
{
    public function index()
    {
        $data_tempat_usaha = \App\TempatUsaha::all();


        //dd($data2);\
        return view('umkmtable.tempatusaha',['data_tempat_usaha'=>$data_tempat_usaha]);
    }
    public function tambah()
    {
        $pelaku_usaha = \App\PelakuUsaha::all();
        $kelurahan = \App\LokasiKelurahan::all();
        $jenis_tempat_usaha = \App\TempatUsahaJenis::all();

        $tempat_usaha_jenis = [];
        foreach($jenis_tempat_usaha as $data_jenis_tempat_usaha){
            $tempat_usaha_jenis[] = $data_jenis_tempat_usaha;
        }
        // memanggil view tambah
        return view('umkmtable.tempatusahatambah',['pelaku_usaha'=>$pelaku_usaha,'kelurahan'=>$kelurahan,'tempat_usaha_jenis'=>$tempat_usaha_jenis]);
    }
    public function create(Request $request)
    {
        DB::table('tempat_usaha')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'x' => $request->x,
            'y' => $request->y,
            'pelaku_usaha_id' => $request->pu_id,
            'kelurahan_id' => $request->kelurahan_id,
            'tempat_usaha_jenis_id' => $request->tuj_jenis_id,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/tempatusahacon');

    }
    public function update($id)
    {
        $data_tempat_usaha = \App\TempatUsaha::all();
        $data2 = [];
        foreach($data_tempat_usaha as $tempat_usaha){
            $data2[] = $tempat_usaha;
        }
        $data = \App\TempatUsaha::find($id);
        return view('umkmtable.updatetempatusaha',['data'=>$data , 'data2' => $data2]);
    }

    public function updates(Request $request)
    {
        DB::table('tempat_usaha')->where('id',$request->id5)->update([
            'nama' => $request->nama
            //'pelaku_usaha_id' => $request->id2
        ]);
        return redirect('/control/tempatusahacon');
    }
    public function hapus($id)
    {
	    DB::table('tempat_usaha')->where('id',$id)->delete();
		
        // alihkan halaman ke halaman pegawai
        return redirect('/control/tempatusahacon');
    }
}