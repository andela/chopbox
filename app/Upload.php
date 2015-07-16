<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
use App\Chop;

class Upload extends Model
{
    


     
    public function chop() {

      return $this->belongsTo('Chop');

    }
}
