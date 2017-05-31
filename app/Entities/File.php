<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\File as SymfonyFile;

class File extends Model
{
    protected $fillable = ['entity_id', 'name', 'entity_type'];

    /**
     * Get all of the owning entity models.
     */
    public function entity()
    {
        return $this->morphTo();
    }

    /**
     * Get this file intance of the file.
     *
     * @return Symfony\Component\HttpFoundation\File\File File instance
     **/
    public function getFileAttribute()
    {
        return new SymfonyFile(storage_path('app/'.$this->attributes['name']));
    }
}
