<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Chop extends Model
{
    

    private $chops_name;
    private $iamge_uri;
    private $user;
    private $likes;


    public function __construct($name, $uri, $user_id, $likes)
    {
      $this->chops_name = $name;
      $this->image_uri = $uri;
      $this->users = $user_id;
      $this->likes = $likes;
    }


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
