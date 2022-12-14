<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait RESTActions {


    public function index()
    {
        $m = self::MODEL;
        return $this->respond(Response::HTTP_OK, $m::all());
    }

    public function show($id)
    {
        $m = self::MODEL;
        $model = $m::find($id);
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function store(Request $request)
    {
        $m = self::MODEL;
        // $this->validate($request, $m::$rules);
        // dd($request->all());
        return $this->respond(Response::HTTP_CREATED, $m::create($request->all()));
    }

    public function update(Request $request, $id)
    {
        $m = self::MODEL;
        // $this->validate($request, $m::$rules);
        $model = $m::find($id);
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $model->update($request->all());
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function destroy($id)
    {
        $m = self::MODEL;
        if(is_null($m::find($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $m::destroy($id);
        return $this->respond(Response::HTTP_OK,array('status'=>'berhasil'));
    }

    public function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }

}