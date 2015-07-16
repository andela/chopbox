<?php

namespace ChopBox;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Follower;
use App\Chop;
use App\Comment;
use App\Role;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname','lastname' 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    private $



    public function followers() {
        return $this->hasMany('Follower');

    }

    public function chops() {

        return $this->hasMany('Chop');

    }

    public function comments() {

        return $this->hasMany('Comment');

    }

    public function roles() {

        return $this->belongsToMany('Role');

    }
}
