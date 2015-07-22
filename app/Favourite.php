<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    //

  private $chops;
  private $user;



  public function __construct($user_id, $chops_id)
  {
    $this->chops = $chops_id;
    $this->user = $user_id;
  }


  pbulic function getChops()
  {
    return $this->chops;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function setUser($user_id)
  {
    $this->user = $user_id;
  }

  public function setChops($chops_id)
  {
    $this->chops = $chops_id;
  }

  public function user(){
    return $this->belongsTo('ChopBox\User');
  }


  public function chops()
  {
    return $this->belongsTo('ChopBox\Chop');
  }
  
}
