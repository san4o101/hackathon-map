<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RangeProduct
 * @package App\Entity
 * @property integer $id
 * @property string $title
 */
class RangeProduct extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'title'];
}
