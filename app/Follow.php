<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    

    private $follower;
    private $followee;


    public function __construct($follower_id, $followee_id)
    {
      $this->follower = $follower_id;
      $this->followee = $followee_id;
    }



    public function user()
    {
      return $this->belongsToMany('ChopBox\User');
    }
}
