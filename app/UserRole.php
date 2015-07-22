<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //

  private $user_id;
  private $role_id;


  public function __construct($user, $role)
  {
    $this->role = $role;
    $this->user = $user;
  }


  public function setRole($role)
  {
    $this->role = $role;
  }

  public function getRole()
  {
    return $this->role;
  }

  public function setUser($id)
  {
    $this->user = $id;
  }

  public function getUser()
  {
    return $this->user;
  }
}
