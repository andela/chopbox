<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Timestamps for the Role
     * @var boolean
     */
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('ChopBox\User');
    }
}
