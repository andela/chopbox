<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
Use App\User;

class Role extends Model
{
    //
  private $role_name;


  protected $fillable = ['role_name']


  public function __construct($role)
  {

    $this->role_name = $role;
  }



    /*
      *relationship between the User and the Role model
        @returns BelongsTo();
    */

  public function user() {

    return $this->belogsToMany('User', 'user_roles');

  }


  //persist to db
  public function persist()
  {

    $this->save();

  }

}
