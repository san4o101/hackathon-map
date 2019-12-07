<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Specialization
 * @package App\Entity
 * @property integer $id
 * @property string $title
 */
class Specialization extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'title'];
}
