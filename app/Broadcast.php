<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    protected $fillable = ['read_at', 'type', 'data', 'action'];

    /**
     * Serialize data coulumn.
     *
     * @param array $data
     **/
    public function setDataAttribute(array $data)
    {
        $this->attributes['data'] = json_encode($data);
    }

    /**
     * Deserialixe the data column.
     *
     * @return object
     **/
    public function getDataAttribute(): object
    {
        return json_decode($this->attributes['data'], false);
    }
}
