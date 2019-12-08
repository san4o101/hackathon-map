<?php

namespace App\Http\Controllers;

use App\Entity\Main;
use App\Entity\ObjectType;
use App\Entity\Opening;
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
        $data = array();
        foreach ($request->get('data') as $item) {
            $data[$item['name']] = $item['value'];
        }
        $name = $data['nameModal'];
        $country = 'Україна';
        $region = 'Кіровоградська область';
        $city = 'Кропивницький';
        $street = $data['streetModal'];
        $number = $data['houseNumberModal'];
        $homeDesc = 'null';
        $latitude = $data['latHiddenModal'];
        $longitude = $data['lngHiddenModal'];
        $object_type_id = $data['type'];
        $specialization_id = $data['spec'];
        $product_range_id = $data['rangeProd'];
        $supplier = $data['supplierModal'];
        $erdpou_code = 'null';
        $retail_space = 1;
        $opening_desc = 'null';

        $mondayOpen = $data['mondayModal'];
        $tuesdayOpen = $data['tuesdayModal'];
        $wednesdayOpen = $data['wednesdayModal'];
        $thursdayOpen = $data['thursdayModal'];
        $fridayOpen = $data['fridayModal'];
        $saturdayOpen = $data['saturdayModal'];
        $sundayOpen = $data['sundayModal'];
        /** @var Opening $opening */
        $opening = Opening::create([
            'monday' => $mondayOpen,
            'tuesday' => $tuesdayOpen,
            'wednesday' => $wednesdayOpen,
            'thursday' => $thursdayOpen,
            'friday' => $fridayOpen,
            'saturday' => $saturdayOpen,
            'sunday' => $sundayOpen,
        ]);

        Main::create([
            'name' => $name,
            'country' => $country,
            'region' => $region,
            'city' => $city,
            'street' => $street,
            'number' => $number,
            'homeDesc' => $homeDesc,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'object_type_id' => $object_type_id,
            'specialization_id' => $specialization_id,
            'product_range_id' => $product_range_id,
            'supplier' => $supplier,
            'erdpou_code' => $erdpou_code,
            'retail_space' => $retail_space,
            'opening_id' => $opening->id,
            'opening_desc' => $opening_desc
        ]);

    }
}
