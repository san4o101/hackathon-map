<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Opening
 * @package App\Entity
 * @property integer $id
 * @property string $monday
 * @property string $tuesday
 * @property string $wednesday
 * @property string $thursday
 * @property string $friday
 * @property string $saturday
 * @property string $sunday
 */
class Opening extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
}
