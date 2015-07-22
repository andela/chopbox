<?php

namespace ChopBox;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

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
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    private $firstname;
    private $lastname;
    private $location;
    private $favourite_food;
    private $about;
    private $gender;
    private $status;
    private $profile_state;



    public function favourites()
    {
        return $this->hasMany('ChopBox\Favoutite');
    }


    public function uploads()
    {
        return $this->hasMany('ChopBox\Upload');
    }

    public function roles()
    {
        return $this->belongsToMany('ChopBox\Roles');
    }
}
