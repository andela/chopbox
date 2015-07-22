<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

  private $comment_id;
  private $comment;




  public function user(){
    return $this->belongsTo('ChopBox\User');
  }
}
