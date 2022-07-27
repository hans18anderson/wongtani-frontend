<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukFotoController extends Controller
{
    

    // public function produkJualList()
    // {
    //     $data = DB::table('v_produk_jual')->get();
         
    //     return response()->json($data);
    // }
    

    
    
    // public function GetData($simpang_id)
    // {
    //     $data = DB::table('v_simpang')->where('id',$simpang_id)->first();
    //     //return response()->json($data);
    //     return response()->json($data);
    // }

    //
    const MODEL = "App\ProdukFoto";

    use RESTActions;
}
