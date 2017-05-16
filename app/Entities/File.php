<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillale = ['entity_id', 'name', 'entity_type'];

    /**
     * Get all of the owning entity models.
     */
    public function entity()
    {
        return $this->morphTo();
    }
}
