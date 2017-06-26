<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
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
     * Date casted fields
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
     * Get uPersonser instance of the person that this certificate belongs to.
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
    public function setSerialNumberAttribute($value)
    {
        $this->attributes['serial_number'] = (int) str_limit(str_shuffle(time().rand()), 7);
    }
}
