<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Http\Requests;
use ChopBox\Chop;
use ChopBox\User;
use Illuminate\Support\Facades\Auth;



class HomepageController extends Controller
{
	/**
	 * Create objects of required database class tables and pass all the associated data from database to the homepage view
	 *
	 * @return \Illuminate\View\View
	 */
	public function index(){

    $all_chops = Chop::all();
	  $all_users = User::all();
	  $user = Auth::user();
    return view('homepage', compact('all_chops', 'all_users', 'user'));
	}
}
