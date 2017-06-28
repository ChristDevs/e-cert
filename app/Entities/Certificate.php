<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     **/
    protected $guarded = [];

    /**
     * Date casted fields.
     *
     * @var array
     **/
    protected $dates = [
        'proccessed_on',
        'auth_on',
        'created_at',
        'updated_at',
    ];

    /**
     * Get user instance of the person that created this certificate.
     *
     * @param Illuminate\Database\Eloquent\Relations\BelongsToRelation
     **/
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get Person instance of the Groom that this certificate belongs to.
     *
     * @param Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function groom(): BelongsTo
    {
        return $this->belongsTo('App\Entities\Person', 'groom_id');
    }

    /**
     * Get Person instance of the Bride that this certificate belongs to.
     *
     * @param Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bride(): BelongsTo
    {
        return $this->belongsTo('App\Entities\Person', 'bride_id');
    }

    /**
     * Get Person instance of the person that this certificate belongs to.
     *
     * @param Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function person(): BelongsTo
    {
        return $this->belongsTo('App\Entities\Person');
    }

    /**
     * Get user instance of the person that authorized this certificate.
     *
     * @param Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function authBy(): BelongsTo
    {
        return $this->belongsTo('App\User', 'auth_by');
    }

    /**
     * Get all documents owned by a model.
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function files(): MorphMany
    {
        return $this->morphMany('App\Entities\File', 'entity');
    }

    /**
     * Generate a serial number.
     *
     * @param string $value
     **/
    public function setSerialNumberAttribute()
    {
        while ($this->generateSerialNumber() == false) {
        }
        
    }

    /**
     * Get all witnesses for this certificate.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function witnesses(): HasMany
    {
        return $this->hasMany('App\Entities\Witness');
    }

    /**
     * Generate Certificate serial Number
     *
     * @return bool|int
     **/
    protected function generateSerialNumber()
    {
        $number = (int) str_limit(str_shuffle(time().rand()), 10);
        if (static::where('serial_number', $number)->count() > 0) {
            return false;
        }
        $this->attributes['serial_number'] = $number;
        return true;
    }
}
