<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'chops_id'
    ];

    public function chops()
    {
        return $this->belongsTo('ChopBox\Chop');
    }

    public function user()
    {
        return $this->belongsTo('ChopBox\User');
    }
}
