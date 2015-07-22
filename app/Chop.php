<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Chop extends Model
{
    //

  private $chops_name;
  private $uplaod_id;
  private $likes;




  protected $fillables = [
      'chops_name',
      'upload_id',
      'likes'

  ];



  public function favourites(){
    return $this->hasMany('ChopBox\Favourite');
  }


  public function uploads()
  {
    return $tis->hasMany('ChopBox\Upload');
  }
}
