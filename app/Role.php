<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    

    private $role;

    public function __construct($role)
    {
      $this->role = $role;
    }


    public function users()
    {
      return $this->belongsToMany('ChopBox\User');
    }
}
