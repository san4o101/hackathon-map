<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ObjectType
 * @package App\Entity
 * @property integer $id
 * @property string $type
 */
class ObjectType extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'type'];
}
