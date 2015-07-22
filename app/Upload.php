<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //

  private $upload_name;
  private $upload_uri;
  private $mime_type;
  privae $chops_id;
  private $user_id;



  public function __construct($name, $uri, $mime)
  {
    $this->mime_type = $mime;
    $this->upload_uri = $uri;
    $this->upload_name = $name;
  }



  public function setChopsId($id)
  {
    $this->chops_id = $id; 
  }

  public function setUserId($id)
  {
    $this->user_id = $id;
  }

  public function user()
  {
    return $this->belongsTo('ChopBox\User');
  }


  public function chops()
  {
    $this->belongsTo('ChopBox\Chop');
  }
}
