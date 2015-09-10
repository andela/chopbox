<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use ChopBox\Http\Requests;
use ChopBox\Chop;
use ChopBox\User;
use ChopBox\Follow;

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
    $this->middleware('home');
  }

  /**
   * Show the application dashboard to the user.
   *
   * @return Response
   */
  public function index() {
      $user = Auth::user();
      $all_users = User::all();
      $follows = Follow::all();
      $following = $follows->where('follower_id', $user->id)->all();
      $followees = [];
      $top_users = \DB::table('chops')
      ->groupBy('user_id')
      ->orderBy(\DB::raw('count(user_id)'), 'DESC')
      ->take(10)
      ->lists('user_id');
      $chops = Chop::all();
      foreach($following as $followee)
      {
        array_push($followees, $followee->followee_id);
      }
      $all_chops = Chop::whereIn('user_id', $followees)
      ->orWhere('user_id', $user->id)->latest()->get();
      return view('pages.home', compact('all_chops', 'all_users', 'user', 'follows','top_users', 'chops'));
  }

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

}
