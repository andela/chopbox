<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Http\Requests;
use ChopBox\Chop;
use ChopBox\User;
<<<<<<< HEAD
Use ChopBox\Upload;
=======
>>>>>>> 1a814d1006567b43db784f1afd6c860be26daa2d
use ChopBox\Follow;
use Illuminate\Support\Facades\Auth;



class HomepageController extends Controller
{
<<<<<<< HEAD
    //
  public function index(){

    $all_chops = Chop::all();
	  $all_users = User::all();
	  $user = Auth::user();
    $follows = Follow::all(); 
    $uploads = Upload::all();
    return view('homepage', compact('all_chops', 'all_users', 'user', 'follows', 'uploads'));
  }
=======
	/**
	 * Create objects of required database class tables and pass all the associated data from database to the homepage view
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{

		$user = Auth::user();
		$all_users = User::all();
		$follow = Follow::all();
		$following = $follow->where('follower_id', $user->id)->all();
		$followees = [];

		foreach($following as $followee)
		{
			array_push($followees, $followee->followee_id);
		}

    	$all_chops = Chop::whereIn('user_id', $followees)
							->orWhere('user_id', $user->id)->latest()->get();

    	return view('homepage', compact('all_chops', 'all_users', 'user', 'follows'));
	}
>>>>>>> 1a814d1006567b43db784f1afd6c860be26daa2d
}
