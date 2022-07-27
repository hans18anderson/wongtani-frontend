<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewSebaranController extends Controller
{
    public function index()
    {
        $data = \App\view_sebaran_pelaku_usaha::all();
        //dd($data);
        $nama = [];
        $jlh = [];

        $umkm = 'UMKM';
        $ata2 = $data->where('bidang_nama',$umkm);
        //dd($ata2);
        foreach($ata2 as $d){
            $nama[] = $d->lokasi_kelurahan_nama;
            $jlh[] = $d->jumlah_pelaku_usaha;
        }
        dd($nama,$jlh);
        return view('graph.produk',['nama' => $nama, 'jlh' => $jlh]) ;
        /*
        $data_produk_jual = \App\produk_jual::all();
        $data_produk = \App\Prod::all();
        $data_brand = \App\Brand::all();

        $data = [];
        $data2 = [];
        $nilai = 0;

        foreach($data_produk_jual as $dp){
            $data[] = $dp->stok;
            $data2[] = $dp->id;
            $nilai++;
            if($nilai == 4){
                break;
            }
            //$data2[] = $data_produk->Prod()->wherePivot('produk_id',$dp->id)->first;
        }
        //dd($data2);
        return view('graph.produk',['data_produk_jual' => $data_produk ,'data_brand' => $data_brand, 'data' => $data, 'data2' => $data2]) ;
    */
    }
}
