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
    protected $fillable = [
                            'firstname',
                            'lastname', 
                            'email', 
                            'password',
                            'location', 
                            'best_food',
                            'username'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    private $firstname;
    private $lastname;
    private $username;
    private $password;
    private $email;
    private $location;
    private $best_food;
    private $about;
    private $gender;
    private $status;
    private $created_at;
    private $updated_at;


    protected $fillables = [
            'location',
            'best_food',
            'about',
            'gender'
    ];


    public function __construct( $username, $password,$email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }




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


    public function saveToDb()
    {
        $this->save();
    }


    public function findWith($id)
    {
        return $this->find($id)->get();
    }


}
