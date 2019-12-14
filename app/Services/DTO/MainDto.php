<?php


namespace App\Services\DTO;


class MainDto
{

    private $name;
    private $country;
    private $region;
    private $city;
    private $street;
    private $number;
    private $homeDesc;
    private $latitude;
    private $longitude;
    private $object_type_id;
    private $specialization_id;
    private $product_range_id;
    private $supplier;
    private $erdpou_code;
    private $retail_space;
    private $opening_desc;

    /**
     * MainDto constructor.
     * @param $name
     * @param $street
     * @param $number
     * @param $homeDesc
     * @param $latitude
     * @param $longitude
     * @param $object_type_id
     * @param $specialization_id
     * @param $product_range_id
     * @param $supplier
     * @param $erdpou_code
     * @param $retail_space
     * @param $opening_desc
     */
    public function __construct($name, $street, $number, $homeDesc, $latitude, $longitude, $object_type_id, $specialization_id, $product_range_id, $supplier, $erdpou_code, $retail_space, $opening_desc)
    {
        $this->name = $name;
        $this->street = $street;
        $this->number = $number;
        $this->homeDesc = $homeDesc;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->object_type_id = $object_type_id;
        $this->specialization_id = $specialization_id;
        $this->product_range_id = $product_range_id;
        $this->supplier = $supplier;
        $this->erdpou_code = $erdpou_code;
        $this->retail_space = $retail_space;
        $this->opening_desc = $opening_desc;

        $this->country = 'Україна';
        $this->region = 'Кіровоградська область';
        $this->city = 'Кропивницький';
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getHomeDesc()
    {
        return $this->homeDesc;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return mixed
     */
    public function getObjectTypeId()
    {
        return $this->object_type_id;
    }

    /**
     * @return mixed
     */
    public function getSpecializationId()
    {
        return $this->specialization_id;
    }

    /**
     * @return mixed
     */
    public function getProductRangeId()
    {
        return $this->product_range_id;
    }

    /**
     * @return mixed
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * @return mixed
     */
    public function getErdpouCode()
    {
        return $this->erdpou_code;
    }

    /**
     * @return mixed
     */
    public function getRetailSpace()
    {
        return $this->retail_space;
    }

    /**
     * @return mixed
     */
    public function getOpeningDesc()
    {
        return $this->opening_desc;
    }


}
