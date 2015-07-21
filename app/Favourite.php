<?php
namespace ChopBox;
/*
 * @author DUgeri, Verem
 */
use Illuminate\Database\Eloquent\Model;
use App\Chop;
use App\User;

class Favourite extends Model
{
    
    private $user_id;
    private $chops_id ;


    public function __construct($user, $chops)
    {
      $this->user_id = $user;
      $this->chops_id = $chops;
    }




    /*
      *relationship between the Favourite and the Chops model
        @returns BelongsTo();
    */
    public function chop() {

      return $this->belongsTo('Chop');

    }


    /*
      *relationship between the User and the Favorite model
        @returns BelongsTo();
    */

    public function user() {

      return $this->belongsTo('User');
      
    }

    //save favourite do db
    public function persist()
    {

      $this->save();

    }
}
