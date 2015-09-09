<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

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
    $this->middleware('auth');
  }

<<<<<<< HEAD
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{   
		$user = Auth::user();
		if ($user->profile_state) {
			return view('pages.home');
		}else {
			return view('pages.first_profile');
		}
		
	}
=======
  /**
   * Show the application dashboard to the user is th user is logged and also
   * checks if the user has completed the profile details.
   */
  public function firstProfile(Request $request) {
    $validation = Validator::make($request->all(), [ 
        'firstname' => 'required|min:2',
        'lastname' => 'required|min:2',
        'location' => 'required|min:2',
        'best_food' => 'required|min:2',
        'gender' => 'required' 
    ]);
    
    if ($validation->fails()) {
      return redirect()->back()->withInput()->withErrors($validation->errors());
    } else {
      $user = Auth::user();
      $user->profile_state = true;
      $user->firstname = $request ['firstname'];
      $user->lastname = $request ['lastname'];
      $user->location = $request ['location'];
      $user->gender = $request ['gender'];
      $user->best_food = $request ['best_food'];
      $user->save();
      return redirect("/");
    }
  }
>>>>>>> staging

}
