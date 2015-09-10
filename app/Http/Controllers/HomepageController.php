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
		$follower = Follow::where('followee_id', $user->id)->count();
		$followings = Follow::where('follower_id', $user->id)->get();
		$followees_id = [];

    	$top = \DB::table('chops')
            ->groupBy('user_id')
            ->orderBy(\DB::raw('count(user_id)'), 'DESC')
            ->take(10)
			->lists('user_id');

		$top_users = User::whereIn('id', $top)->get();

		foreach($followings as $followee)
		{
			array_push($followees_id, $followee->followee_id);
		}

		$following = count($followees_id);

  		$chops = Chop::whereIn('user_id', $followees_id)
						->orWhere('user_id', $user->id)->latest()->get();

  		return view('homepage', compact('user', 'chops', 'follower', 'top_users', 'following'));
	}
}
