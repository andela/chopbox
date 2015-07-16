<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Favourite;
use App\Upload;

class Chop extends Model
{
  
  private $chops_name;
  private $chops_image;

  
  public function __construct($name, $image)
  {

    $this->chops_image  = $image;
    $this->chops_name = $name;

  }


  /*
    *relationship between the User and the Chops model
      @returns BelongsTo();
  */

  public function user() {

    return $this->belongsTo('User');

  }


  /*
    *relationship between the Favourites and the Chops model
      @returns BelongsTo();
  */
  public function favourites() {

    return $this->hasMany('Favourite');

  }


  /*
    *relationship between the Uploads and the Chops model
      @returns BelongsTo();
  */

  public function uploads() {

    return $this->hasMany('Upload')
  }

  //save the chops details to db
  public function persist()
  {

    $this->save();

  }



}
