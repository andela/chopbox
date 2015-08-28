<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller {
	
	/*
	 * |--------------------------------------------------------------------------
	 * | Welcome Controller
	 * |--------------------------------------------------------------------------
	 * |
	 * | This controller renders the "marketing page" for the application and
	 * | is configured to only allow guests. Like most of the other sample
	 * | controllers, you are free to modify or remove it as you desire.
	 * |
	 */
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
	}
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index() {
		if (Auth::check ()) {
			$user = Auth::user ();
			if ($user->profile_state) {
				return view ( 'pages.home' );
			} else {
				return view ( 'pages.first_profile' );
			}
		} else {
			return view ( 'pages.welcome' );
		}
	}
}
