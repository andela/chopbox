<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    

    private $name;
    private $mime;
    private $uri;
    private $chops_id;
    private $user_id;



    public function __construct($name, $mime, $uri)
    {
      $this->name = $name;
      $this->mime = $mime;
      $this->uri = $uri;
    }

    public function chops()
    {
      reutrn $this->belongsTo('ChopBox\Chop');
    }

    public function user()
    {
      return $this->belongsTo('ChopBox\user');
    }


    public function setChopsIdAttribute($id)
    {
      $this->chops_id = $id;
    }

    public function setUserIdAttribute($id)
    {
      $this->user_id = $id;
    }
}
