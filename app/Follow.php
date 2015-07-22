<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //

  private $follower;
  private $followee;


  public function __construct($follower_id, Followee_id)
  {
    $this->follower = $follower_id;
    $this->followee = $Followee_id;
  }

  public function user()
  {
    return $this->belongsToMany('ChopBox\User');
  }

}
