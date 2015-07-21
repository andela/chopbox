<?php
namespace ChopBox;
/*
 * @author Dugeri, Verem
 */
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


    private $firstName;
    private $lastName;
    private $username;
    private $password;
    private $email;
    private $location;
    private $best_food;
    private $about;
    private $gender;
    private $status;


    protected $fillables = [
    // 'location',
    // 'best_food',
    // 'about',
    // 'gender',
    'username', 
    'password',
    'email'
    ];


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

    public function setFirstNameAttribute($first)
    {
        $this->firstName = $first;
    }

    public function setLastNameAttribute($last)
    {
        $this->lastName = $last;
    }

    public function setLocationAttribute($location)
    {
        $this->location = $location;
    }

    public function setBestFoodAttribute($best_food)
    {
        $this->best_food = $best_food;
    }

    public function setAbout($about)
    {
        $this->about = $about;
    }

    public function setGenderAttribute($gender)
    {
        $this->gender = $gender;
    }

    public function setStatusAttribute($status)
    {
        $this->status = $status;
    }

    public function findWithUsername($param)
    {
        return $this::where('username', $param)->get();
    }

    // public function findWithUsername($username)
    // {
    //     return $this::find($username)->get();
    // }


    public function persist($request)
    {
        $this::create(['username'=>$request['username'], 'password' =>bcrypt($request['password']), 'email' =>$request['email']]);
    }


}
