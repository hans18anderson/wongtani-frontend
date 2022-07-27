<?php

namespace App\Http\Controllers;

use App\TempatUsaha;
use Illuminate\Http\Request;

class PlaceMapController extends Controller
{
    public function index()
    {
        $places = TempatUsaha::all();
        return view('places.map', compact('places'));
    }
}