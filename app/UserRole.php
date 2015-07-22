<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    

    private $role_id;
    private $user_id;

    public function __construct($role, $user)
    {
      $this->role_id = $role;
      $this->user_id = $user;
    }


    public function users()
    {
      $return $this->belongsToMany('ChopBox\User');
    }
}
