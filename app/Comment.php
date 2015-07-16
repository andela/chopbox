<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Chop;

class Comment extends Model
{
    


    private $user_id;
    private $comment;



     protected $fillable = ['comment'];


    public function __construct($user_id, $comment)
    {

      $this->user_id = $user_id;
      $this->comment = $comment;

    }




    /*
      *relationship between the User and the Comment model
        @return BelongsTo();
    */

    public function user() 
    {

      return $this->belongsTo('User');

    }


  /*
    *relationship between the Chops and the comment model
      @return BelongsTo();
  */
    public function chops() 
    {

      return $this->belongsTo('Chop');
      
    }


    //save comment to db

    public function persist()
    {

      $this->save();

    }
}
