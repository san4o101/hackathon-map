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
}
