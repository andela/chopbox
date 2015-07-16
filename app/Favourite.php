<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
use App\Chop;
use App\User;

class Favourite extends Model
{
    

    public function chop() {

      return $this->belongsTo('Chop');

    }

    public function user() {

      return $this->belongsTo('User');
      
    }
}
