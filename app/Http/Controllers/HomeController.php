<?php

namespace App\Http\Controllers;

use App\Entity\Main;
use App\Entity\ObjectType;
use App\Entity\RangeProduct;
use App\Entity\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rangeProd = RangeProduct::all();
        $spec = Specialization::all();
        $types = ObjectType::all();
        return view('home', compact('rangeProd', 'spec', 'types'));
    }

    public function map(Request $request)
    {
        $query = Main::with('opening');
        if($rangeProd = $request->get('rangeProd')) {
            $query->where('product_range_id', '=', $rangeProd);
        }
        if($spec = $request->get('spec')) {
            $query->where('specialization_id', '=', $spec);
        }
        if($type = $request->get('type')) {
            $query->where('object_type_id', '=', $type);
        }
        if($street = $request->get('street')) {
            $query->where('street', 'LIKE', '%'.$street.'%');
        }
        if($supplier = $request->get('supplier')) {
            $query->where('supplier', 'LIKE', '%'.$supplier.'%');
        }
        $data = $query->get()->toArray();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $name = $request->get('nameModal');
        $country = 'Україна';
        $region = 'Кіровоградська область';
        $city = 'Кропивницький';
        $street = $request->get('streetModal');

    }
}
