<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    /**
     * Fillable Model attributes.
     *
     * @var array
     **/
    public $fillable = ['first_name', 'last_name', 'sir_name', 'dob', 'user_id', 'id_no', 'gender', 'name_of_mother', 'residence', 'name_of_father', 'birth_place', 'county_of_birth', 'province_of_birth', 'alive', 'relation', 'spouse_id_no', 'cause_of_death', 'city', 'email', 'mobile', 'phone', 'zip', 'street', 'died_on'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'dob',
        'died_on',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'married' => 'boolean',
    ];

    /**
     * Certificate Relation.
     *
     * Get all certificates associatated to this person
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function certificates(): HasMany
    {
        return $this->hasMany('App\Entities\Certificate');
    }

    /**
     * Get fullname attribute
     *
     * @return string
     **/
    public function getFullnameAttribute(): string
    {
        $name = "{$this->first_name} {$this->last_name} {$this->sir_name}";

        return ucwords($name);
    }

    /**
     * Get the dob attribute as yyyy-mm-dd formated date
     *
     * @return string
     **/
    public function getDobAttribute(): string
    {
        return \Carbon\Carbon::parse($this->attributes['dob'])->format('Y-m-d');
    }

    /**
     * Generate an address for a person
     *
     * @return string
     **/
    public function getAddressAttribute(): string
    {
        return ucwords($this->attributes['residence'].', '.$this->attributes['city'].', '.$this->attributes['zip']);
    }
    /**
     * Set phone attribute
     *
     * @param string $value
     **/
    public function setPhoneNumberAttribute($value)
    {
        $this->attributes['phone'] = $value;
    }
}
