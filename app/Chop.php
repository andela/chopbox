<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Chop extends Model
{
    protected $fillable = [
      'chops_name',
      'file_uri',
      'likes'
  ];

    public function user()
    {
        return $this->belongsTo('ChopBox\User');
    }

    public function uploads()
    {
        return $this->hasMany('ChopBox\Upload');
    }

    public function favourites()
    {
        return $this->hasMany('ChopBox\Favourite');
    }

    public function comments()
    {
        return $this->hasMany('ChopBox\Comment');
    }
}
