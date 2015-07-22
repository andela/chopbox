<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    

    private $user;
    private $comment;


    public function __construct($user_id, $comment)
    {
      $this->user = $user_id;
      $this->comment = $comment;
    }


    public function user()
    {
      return $this->belongsTo('ChopBox\User');
    }

    public function chops()
    {
      return $this->belongsTo('ChopBox\Chop');
    }
}
