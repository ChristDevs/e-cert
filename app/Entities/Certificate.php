<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     **/
    protected $guarded = [];

    /**
     * Get user instance of the person that created this certificate.
     *
     * @param Illuminate\Database\Eloquent\Relations\BelongsToRelation
     **/
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Get user instance of the person that authorized this certificate.
     *
     * @param Illuminate\Database\Eloquent\Relations\BelongsToRelation
     **/
    public function authBy()
    {
        return $this->belongsTo('App\User', 'auth_by');
    }

    /**
     * Get all documents owned by a model.
     *
     * @return Illuminate\Database\Eloquent\Relations\MoprhToRelation
     **/
    public function files()
    {
        return $this->morphMany('App\Entities\File', 'entity');
    }
}
