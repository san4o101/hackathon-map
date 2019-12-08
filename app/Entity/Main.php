<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Main
 * @package App\Entity
 * @property integer $id
 * @property string $name
 * @property string $country
 * @property string $region
 * @property string $city
 * @property string $street
 * @property string $number
 * @property string $homeDesc
 * @property string $latitude
 * @property string $longitude
 * @property integer $object_type_id
 * @property integer $specialization_id
 * @property integer $product_range_id
 * @property string $supplier
 * @property string $erdpou_code
 * @property double $retail_space
 * @property integer $opening_id
 * @property string $opening_desc
 */
class Main extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'country', 'region', 'city', 'street', 'number', 'homeDesc', 'latitude', 'longitude',
        'object_type_id', 'specialization_id', 'product_range_id', 'supplier', 'erdpou_code', 'retail_space', 'opening_id',
        'opening_desc' ];

    public function opening()
    {
        return $this->hasOne(Opening::class, 'id', 'opening_id');
    }
}
