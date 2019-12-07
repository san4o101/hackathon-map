<?php

namespace App\Http\Controllers;

use App\Entity\Main;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Main::select('name as title', 'latitude as lat', 'longitude as lng')->get()->toArray();
        $array = [
            'lat' => '48.5097',
            'lng' => '32.2656',
            'zoom' => '13',
            'markers' => $data,
        ];
        return view('home', compact('array'));
    }
}
