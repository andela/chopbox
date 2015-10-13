<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'role_id',
          'user_id'
    ];

    public $timestamps = false;

    public function users() {
        return $this->belongsToMany('ChopBox\User');
    }

}
