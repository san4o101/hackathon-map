<?php

namespace App\Http\Controllers;

use App\Entity\Main;
use App\Entity\ObjectType;
use App\Entity\Opening;
use App\Entity\RangeProduct;
use App\Entity\Specialization;
use App\Services\DTO\MainDto;
use App\Services\DTO\OpeningDTO;
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
        $data = $this->getJsonData($request->get('data'), 'Create');
        $openingDto = $data['opening'];
        $mainDto = $data['main'];

        $this->transactionCreateAndUpdate($openingDto, $mainDto);
    }

    public function delete(Main $marker)
    {
        try {
            $marker->forceDelete();
            return response('success', 200);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), 500);
        }
    }

    public function editForm(Main $marker)
    {
        return response()->json(Main::with('opening')->where('id', '=', $marker->id)->first());
    }

    public function edit(Main $marker, Request $request)
    {
        $data = $this->getJsonData($request->get('data'), 'Edit');
        /** @var OpeningDTO $openingDto */
        $openingDto = $data['opening'];
        /** @var MainDto $mainDto */
        $mainDto = $data['main'];

        /** @var Opening $opening */
        $opening = $marker->opening()->first();
        \DB::transaction(function () use ($opening, $openingDto, $marker, $mainDto) {
            $opening->monday = $openingDto->getMonday();
            $opening->tuesday = $openingDto->getTuesday();
            $opening->wednesday = $openingDto->getWednesday();
            $opening->thursday = $openingDto->getThursday();
            $opening->friday = $openingDto->getFriday();
            $opening->saturday = $openingDto->getSaturday();
            $opening->sunday = $openingDto->getSunday();
            $opening->save();

            $marker->name = $mainDto->getName();
            $marker->country = $mainDto->getCountry();
            $marker->region = $mainDto->getRegion();
            $marker->city = $mainDto->getCity();
            $marker->street = $mainDto->getStreet();
            $marker->number = $mainDto->getNumber();
            $marker->homeDesc = $mainDto->getHomeDesc();
            $marker->latitude = $mainDto->getLatitude();
            $marker->longitude = $mainDto->getLongitude();
            $marker->object_type_id = $mainDto->getObjectTypeId();
            $marker->specialization_id = $mainDto->getSpecializationId();
            $marker->product_range_id = $mainDto->getProductRangeId();
            $marker->supplier = $mainDto->getSupplier();
            $marker->erdpou_code = $mainDto->getErdpouCode();
            $marker->retail_space = $mainDto->getRetailSpace();
            $marker->opening_desc = $mainDto->getOpeningDesc();
            $marker->save();
        });
    }

    private function getJsonData($requestData, $modal)
    {
        $data = array();
        foreach ($requestData as $item) {
            $data[$item['name']] = $item['value'];
        }

        $mainDto = new MainDto($data['nameModal'.$modal], $data['streetModal'.$modal], $data['houseNumberModal'.$modal],
            $data['homeDescModal'.$modal], $data['latModal'.$modal], $data['lngModal'.$modal], $data['typeModal'.$modal],
            $data['specModal'.$modal], $data['rangeProdModal'.$modal], $data['supplierModal'.$modal], $data['erdpouCodeModal'.$modal],
            $data['retailSpaceModal'.$modal], $data['openingDescModal'.$modal]);

        $openingDto = new OpeningDTO($data['mondayModal'.$modal], $data['tuesdayModal'.$modal], $data['wednesdayModal'.$modal],
            $data['thursdayModal'.$modal], $data['fridayModal'.$modal], $data['saturdayModal'.$modal], $data['sundayModal'.$modal]);

        return [
            'main' => $mainDto,
            'opening' => $openingDto
        ];
    }

    private function transactionCreateAndUpdate(OpeningDTO $openingDto, MainDto $mainDto)
    {
        \DB::transaction(function () use ($openingDto, $mainDto) {
            /** @var OpeningDTO $openingDto */
            /** @var MainDto $mainDto */
            /** @var Opening $opening */
            $opening = Opening::create([
                'monday' => $openingDto->getMonday(),
                'tuesday' => $openingDto->getTuesday(),
                'wednesday' => $openingDto->getWednesday(),
                'thursday' => $openingDto->getThursday(),
                'friday' => $openingDto->getFriday(),
                'saturday' => $openingDto->getSaturday(),
                'sunday' => $openingDto->getSunday(),
            ]);

            Main::create([
                'name' => $mainDto->getName(),
                'country' => $mainDto->getCountry(),
                'region' => $mainDto->getRegion(),
                'city' => $mainDto->getCity(),
                'street' => $mainDto->getStreet(),
                'number' => $mainDto->getNumber(),
                'homeDesc' => $mainDto->getHomeDesc(),
                'latitude' => $mainDto->getLatitude(),
                'longitude' => $mainDto->getLongitude(),
                'object_type_id' => $mainDto->getObjectTypeId(),
                'specialization_id' => $mainDto->getSpecializationId(),
                'product_range_id' => $mainDto->getProductRangeId(),
                'supplier' => $mainDto->getSupplier(),
                'erdpou_code' => $mainDto->getErdpouCode(),
                'retail_space' => $mainDto->getRetailSpace(),
                'opening_id' => $opening->id,
                'opening_desc' => $mainDto->getOpeningDesc()
            ]);
        });
    }
}
