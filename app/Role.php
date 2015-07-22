<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
  private $role_name;


  public function __construct($role)
  {
    $this->role_name = $role;
  }

  public function getRole()
  {
    $return $this->role;
  }

  public function setRole($role)
  {
    $this->role = $role;
  }
  public function user()
  {
    return $this->hasMany('ChopBox\User');
  }
}
