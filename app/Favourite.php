<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    //


  public function user(){
    return $this->belongsTo('ChopBox\User');
  }


  public function chops()
  {
    return $this->belongsTo('ChopBox\Chop');
  }
  
}
