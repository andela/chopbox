<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Chop extends Model
{


    protected $fillable = [  
          'chops_name',
          'image_uri',
          'likes'

    ];


    public function user()
    {
      return $this->belongTo('ChopBox\User');
    }

    public function uploads()
    {
      return $this->hasMany('ChopBox\Uploads');
    }

    public function favourites()
    {
      return $this->hasMany('ChopBox\Favourite');
    }
}
