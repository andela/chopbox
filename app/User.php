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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'username',
            'email',
            'password',
            'status',
            'profile_state'
        ];



    public function favourites()
    {
        return $this->hasMany('ChopBox\Favourite');
    }


    public function uploads()
    {
        return $this->hasMany('ChopBox\Upload');
    }

    public function roles()
    {
        return $this->belongsToMany('ChopBox\Role');
    }

	public function chops()
	{
		return $this->hasMany('ChopBox\Chop');
	}
}
