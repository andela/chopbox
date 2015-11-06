<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function user()
    {
        return $this->belongsToMany('ChopBox\User');
    }
}
