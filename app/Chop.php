<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Chop extends Model
{
    //

  private $chops_name;
  private $likes;




  protected $fillables = [
      'chops_name',
      'upload_id',
      'likes'

  ];

  public function __construct($chops, $likes)
  {
    $this->chops_name = $chops;
    $this->likes = $likes;
  }


  public function setChopsName($name)
  {
    $this->chops_name = $name;
  }

  public function getChopsName()
  {
    return $this->chops_name;
  }

  public function setLikes($like)
  {
    $this->likes = $like;
  }

  public function getLike()
  {
    return $this->likes;
  }



  public function favourites(){
    return $this->hasMany('ChopBox\Favourite');
  }


  public function uploads()
  {
    return $tis->hasMany('ChopBox\Upload');
  }
}
