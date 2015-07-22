<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    


    private $user;
    private $chops;


    public function __construct($user_id, $chops_id)
    {
      $this->user = $user_id;
      $this->chops = $chops_id;
    }


    public function chops()
    {
      return $this->belongsTo('ChopBox\Chop');
    }

    public function user()
    {
      return $this->belongsTo('ChopBox\User');
    }

    public func
}
