<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Http\Requests;
use ChopBox\Chop;
use ChopBox\User;
use ChopBox\Follow;
use Illuminate\Support\Facades\Auth;



class HomepageController extends Controller
{
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
}
