<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromosiController extends Controller
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
        $data_promosi = \App\Promosi::all();


        //dd($data2);\
        return view('umkmtable.umkmpromosi',['data_promosi'=>$data_promosi]);
    }
    const MODEL = "App\Promosi";

    use RESTActions;
    public function tambah()
    {
        $data_status = \App\PenjualanPelakuUsahaStatus::all();

        $status_data = [];
        foreach($data_status as $status){
            $status_data[] = $status;
        }
        // memanggil view tambah
        return view('umkmtable.umkmtambahpromosi',['status_data'=>$status_data ]);
    }
    public function create(Request $request)
    {
        $tgl_msk = $request->tanggal_mulai;
        $tgl_sls = $request->waktu_mulai;
        $tgl_masuk = $tgl_msk.' '.$tgl_sls;
        $datetime_masuk = date_create($tgl_masuk);

        $tgl_msk2 = $request->tanggal_selesai;
        $tgl_sls2 = $request->waktu_selesai;
        $tgl_keluar = $tgl_msk2.' '.$tgl_sls2;
        $datetime_selesai = date_create($tgl_keluar);

        DB::table('promosi')->insert([
            'nama' => $request->nama,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $datetime_masuk,
            'tanggal_selesai' => $datetime_selesai,
            'kode_promosi' => $request->kode_promosi,
            'path_foto_promosi' => $request->path_foto_promosi,
            'status' => $request->id2
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/control/promosicon');
    }
    public function update($id)
    {
        $data = \App\Promosi::find($id);
        //waktu masuk
        $masuk = date_create($data->tanggal_mulai);
        $tgl_masuk = $masuk->format('Y-m-d');
        $waktu_masuk = date_format($masuk,"H:i");
        //waktu selesai
        $selesai = date_create($data->tanggal_selesai);
        $tgl_sls = $selesai->format('Y-m-d');
        $waktu_sls = date_format($selesai,"H:i");
        return view('umkmtable.umkmupdatepromosi',['data'=>$data,'tgl_masuk'=>$tgl_masuk,'waktu_masuk'=>$waktu_masuk,'tgl_sls'=>$tgl_sls,'waktu_sls'=>$waktu_sls]);
    }

    public function updates(Request $request)
    {
        $tgl_msk = $request->tanggal_mulai;
        $tgl_sls = $request->waktu_mulai;
        $tgl_masuk = $tgl_msk.' '.$tgl_sls;
        $datetime_masuk = date_create($tgl_masuk);

        $tgl_msk2 = $request->tanggal_selesai;
        $tgl_sls2 = $request->waktu_selesai;
        $tgl_keluar = $tgl_msk2.' '.$tgl_sls2;
        $datetime_selesai = date_create($tgl_keluar);

        DB::table('promosi')->where('id',$request->id5)->update([
            'nama' => $request->nama,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $datetime_masuk,
            'tanggal_selesai' => $datetime_selesai,
            'kode_promosi' => $request->kode_promosi,
            'path_foto_promosi' => $request->path_foto_promosi,
            'status' => $request->id2
        ]);
        return redirect('/control/promosicon');
    }
    public function hapus($id)
    {
	    DB::table('promosi')->where('id',$id)->delete();
		
        // alihkan halaman ke halaman pegawai
        return redirect('/control/promosicon');
    }
}
