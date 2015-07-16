<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Favourite;
use App\Upload;

class Chop extends Model
{
  

  




  public function user() {

    return $this->belongsTo('User');

  }

  public function favourites() {

    return $this->hasMany('Favourite');

  }

  public function uploads() {

    return $this->hasMany('Upload')
  }

}
