<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TempatUsahaJenisController extends Controller
{
    public function index()
    {
        $data_tempat_usaha_jenis = \App\TempatUsahaJenis::all();


        //dd($data2);\
        return view('admin.user.tempatusahajenis',['data_tempat_usaha_jenis'=>$data_tempat_usaha_jenis]);
    }
    public function tambah()
    {
        $data_tempat_usaha_jenis = \App\TempatUsahaJenis::all();

        $tempat_usaha_jenis_data = [];
        foreach($data_tempat_usaha_jenis as $tempat_usaha_jenis){
            $tempat_usaha_jenis_data[] = $tempat_usaha_jenis;
        }
        // memanggil view tambah
        return view('admin.user.tambahtempatusahajenis',['tempat_usaha_jenis_data'=>$tempat_usaha_jenis_data]);
    }
    public function create(Request $request)
    {
        DB::table('tempat_usaha_jenis')->insert([
            'nama' => $request->nama
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminUser/tempatusahajeniscon');

    }
    public function update($id)
    {
        $data_tempat_usaha_jenis = \App\TempatUsahaJenis::all();
        $data2 = [];
        foreach($data_tempat_usaha_jenis as $tempat_usaha_jenis){
            $data2[] = $tempat_usaha_jenis;
        }
        $data = \App\TempatUsahaJenis::find($id);
        return view('admin.user.updatetempatusahajenis',['data'=>$data , 'data2' => $data2]);
    }

    public function updates(Request $request)
    {
        DB::table('tempat_usaha_jenis')->where('id',$request->id5)->update([
            'nama' => $request->nama
            //'pelaku_usaha_id' => $request->id2
        ]);
        return redirect('/AdminUser/tempatusahajeniscon');
    }
    public function hapus($id)
    {
	    DB::table('tempat_usaha_jenis')->where('id',$id)->delete();
		
        // alihkan halaman ke halaman pegawai
        return redirect('/AdminUser/tempatusahajeniscon');
    }
}