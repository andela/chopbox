<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Chop;

class Comment extends Model
{
    //


  public function user() {

    return $this->belongsTo('User');

  }

  public function chops() {

    return $this->belongsTo('Chop');
    
  }
}
