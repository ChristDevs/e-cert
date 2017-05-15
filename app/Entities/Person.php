<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * Fillable Model attributes.
     *
     * @var array
     **/
    public $fillable = ['first_name', 'last_name', 'sir_name', 'dob', 'user_id', 'id_no', 'gender', 'name_of_mother', 'residence', 'name_of_father', 'birth_place', 'county_of_birth', 'province_of_birth', 'alive', 'relation', 'spouse_id_no', 'cause_of_death'];

    /**
     * Date attributes.
     *
     * @var array
     **/
    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
    ];

    /**
     * Certificate Relation.
     *
     * Get all certificates associatated to this person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyRelation
     **/
    public function certificates()
    {
        return $this->hasMany('App\Entities\Certificate');
    }

    /**
     * undocumented function summary.
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function getFullnameAttribute()
    {
        $name = "{$this->first_name} {$this->last_name} {$this->sir_name}";

        return ucwords($name);
    }
}
