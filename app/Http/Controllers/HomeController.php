<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use ChopBox\Http\Requests;
use ChopBox\Http\Requests\ProfileRequest;
use ChopBox\Chop;
use ChopBox\User;
use ChopBox\Follow;
use ChopBox\ChopBox\Repository\ChopRepository;

class HomeController extends Controller {

  /*
   * |--------------------------------------------------------------------------
   * | Home Controller
   * |--------------------------------------------------------------------------
   * |
   * | This controller renders your application's "dashboard" for users that
   * | are authenticated. Of course, you are free to change or remove the
   * | controller as you wish. It is just here to get your app started!
   * |
   */

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    //$this->middleware('home');
  }

  /**
   * Show the application dashboard to the user.
   *
   * @return Response
   */
  public function index(ChopRepository $chopRepo) {
	  $user = Auth::user();
	  $follower = Follow::where('followee_id', $user->id)->count();
	  $followings = Follow::where('follower_id', $user->id)->get();
	  $followees_id = [];

    /* find and order the users that have the highest number of chops */

	  $top =  User::orderBy('chops_count', 'DESC')->take(10)->get();

	  foreach($followings as $followee)
	  {
		  array_push($followees_id, $followee->followee_id);
	  }

	  $following = count($followees_id);

	  $chops = Chop::whereIn('user_id', $followees_id)
		  ->orWhere('user_id', $user->id)->latest()->get();

    $chopCount = count($chops);

	  return view('homepage', compact('user', 'chops', 'top'));
  }

  /**
   * Show the application dashboard to the user is th user is logged and also
   * checks if the user has completed the profile details.
   */
  public function firstProfile(ProfileRequest $request) {
    
    
  
    $user = Auth::user();

    $this->saveUser($user, $request);

    $follower = Follow::where('followee_id', $user->id)->count();
    $followings = Follow::where('follower_id', $user->id)->get();
    $followees_id = [];

    /* find and order the users that have the highest number of chops */

    $top =  User::orderBy('chops_count', 'DESC')->take(10)->get();

    foreach($followings as $followee)
    {
      array_push($followees_id, $followee->followee_id);
    }

    $following = count($followees_id);

    $chops = Chop::whereIn('user_id', $followees_id)
      ->orWhere('user_id', $user->id)->latest()->get();

    $chopCount = count($chops);

    return view('homepage', compact('user', 'chops', 'top'));
      
    }

  private  function saveUser(User $user, profileRequest $request) {
    $user->profile_state = true;
    $user->firstname = $request ['firstname'];
    $user->lastname = $request ['lastname'];
    $user->location = $request ['location'];
    $user->gender = $request ['gender'];
    $user->best_food = $request ['best_food'];
    $user->save();
  }
}
