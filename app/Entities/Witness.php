<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Witness extends Model
{
    /**
     * Fillable Model attributes.
     *
     * @var array
     **/
    public $fillable = ['full_name', 'id_no', 'certificate_id'];

    /**
     * Full name mutator.
     *
     * @param string $value
     **/
    public function setNameAttribute($value)
    {
        $this->attributes['full_name'] = $value;
    }
}
