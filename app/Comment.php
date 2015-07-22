<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

  
  private $comment;
  private $user;



  public function __construct($comment, $user_id)
  {
    $this->comment = $comment;
    $this->user = $user_id;
  }

  public function setComment($comment)
  {
    $this->comment = $comment;
  }

  public function getComment()
  {
    return $this->comment;
  }

  public function setUser($user)
  {
    $this->user = $user;
  }

  public function getUser()
  {
    return $this->user;
  }


  public function user(){
    return $this->belongsTo('ChopBox\User');
  }
}
