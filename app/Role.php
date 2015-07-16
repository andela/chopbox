<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
Use App\User;

class Role extends Model
{
    //



  public function user() {

    return $this->belogsToMany('User', 'user_roles');

  }
}
