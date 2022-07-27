<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SebaranController extends Controller
{
    

    public function sebaranPelakuUsaha()
    {
        $data = DB::table('v_sebaran_pelaku_usaha')->get();
         
        return response()->json($data);
    }

    public function sebaranProdukJualPetani()
    {
        $data = DB::table('v_sebaran_produk_jual_petani')->get();
         
        return response()->json($data);
    }

    public function sebaranProdukJualUMKM()
    {
        $data = DB::table('v_sebaran_produk_jual_umkm')->get();
         
        return response()->json($data);
    }

    public function timelinePenjualanProduk()
    {
        $data = DB::table('v_timeline_penjualan_produk')->get();
         
        return response()->json($data);
    }

    public function timelinePenjualanProdukPetani()
    {
        $data = DB::table('v_timeline_penjualan_produk_petani')->get();
         
        return response()->json($data);
    }

    public function timelinePenjualanProdukUMKM()
    {
        $data = DB::table('v_timeline_penjualan_produk_umkm')->get();
         
        return response()->json($data);
    }

    
    // public function GetData($simpang_id)
    // {
    //     $data = DB::table('v_simpang')->where('id',$simpang_id)->first();
    //     //return response()->json($data);
    //     return response()->json($data);
    // }

    const MODEL = "App\TanamProduk";

    use RESTActions;
}
