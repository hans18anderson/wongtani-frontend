<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BidangUsahaController extends Controller
{
    public function index()
    {
        $data_bidang = \App\BidangUsaha::all();
        return view('admin.user.bidangusaha.table',['data_bidang'=>$data_bidang]);
    }
    //
    const MODEL = "App\BidangUsaha";

    public function tambah()
    {
        return view('admin.user.bidangusaha.tambah');
    
    }
    public function create(Request $request)
    {
        DB::table('bidang_usaha')->insert([
            'nama' => $request->nama
        ]);
        return redirect('/AdminUser/biduscon');
    }
    public function update($id)
    {
        $data = \App\BidangUsaha::find($id);
        return view('admin.user.bidangusaha.update',['data'=>$data]);
    }
    public function updates(Request $request)
    {
        DB::table('bidang_usaha')->where('id',$request->id5)->update([
            'nama' => $request->nama
        ]);
        return redirect('/AdminUser/biduscon');
    }
    public function hapus($id)
    {
        DB::table('bidang_usaha')->where('id',$id)->delete();
        return redirect('/AdminUser/biduscon');
    }

    use RESTActions;
}
