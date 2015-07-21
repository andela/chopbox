<?php
namespace ChopBox;
/*
 * @author Dugeri, Verem
 */
use Illuminate\Database\Eloquent\Model;
use App\User;

class Follower extends Model
{
    
    private $Follower_id;
    private $followee_id;


    public function __construct($follower, $followee)
    {

      $this->Follower_id = $follower;
      $this->followee_id = $followee;
    }


    /*
      *relationship between the User and the Follower model
        @returns BelongsTo();
    */

    public function user() {

        return $this->belongsToMany('User');
        
    }

    //save follower to db

    public function persist()
    {

      $this->save();

    }
}
