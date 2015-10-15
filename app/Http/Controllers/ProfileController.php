<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ChopBox\Http\Controllers\Controller;
use ChopBox\ChopBox\Repository\UserRepository;

class ProfileController extends Controller
{
	/**
	 * Store users details
	 * @var UserRepository
	 */
	private $users;

	public function __construct(UserRepository $users) {
		$this->users = $users;
	}


	public function viewProfile(Request $request, $username = null) {

		$username = trim(filter_var($username, FILTER_SANITIZE_STRING));
		$user = $this->users->findUserByUsername($username);
		$loggedInUser = (Auth::check())?Auth::user():null;

		if(isset($user->username)){
			return view('pages.profile', compact('user', 'loggedInUser'));
		}


	}
}
