<?php

namespace ChopBox\Http\Controllers;

use ChopBox\ChopBox\Repository\ChopsRepository;
use ChopBox\ChopBox\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Validator;
use ChopBox\Http\Requests;
use ChopBox\Http\Requests\ProfileRequest;
use ChopBox\Chop;
use ChopBox\User;
use ChopBox\Follow;

class HomeController extends Controller
{
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
  public function __construct()
  {
  }

  /**
   * Show the application dashboard to the user.
   *
   * @return Response
   */

  public function index(UserRepository $userRepository, ChopsRepository $chopsRepository)
  {
	  $user = Auth::user();

	/* find and order the users that have the highest number of chops */
		$topTen =  $userRepository->topUsers();

	/* find followee ids */
		$followeeIds = $this->getFolloweeIds($user);

	  $chops = $chopsRepository->getUserChops($user, $followeeIds);

	  return view('homepage', compact('user', 'chops', 'topTen'));
  }

  /**
   * Show the application dashboard to the user is th user is logged and also
   * checks if the user has completed the profile details.
   */
  public function firstProfile(ProfileRequest $request, UserRepository $userRepository, ChopsRepository $chopRepository)
  {

	/*get the authenticated user */
	  $user = Auth::user();


	/*save user details to database */
	  $this->saveUser($user, $request);

    /* find and order the users that have the highest number of chops */
	  $topTen =  $userRepository->topUsers();

    /*find followee ids */
	  $followeeIds = $this->getFolloweeIds($user);

      $chops = $chopRepository->getUserChops($user, $followeeIds);

      return view('homepage', compact('user', 'chops', 'topTen'));
  }

    private function saveUser(User $user, profileRequest $request)
    {
        $user->profile_state = true;
        $user->firstname = $request ['firstname'];
        $user->lastname = $request ['lastname'];
        $user->location = $request ['location'];
        $user->gender = $request ['gender'];
        $user->best_food = $request ['best_food'];
        $user->save();
    }


    private function getFolloweeIds(User $user)
    {
        $followings = Follow::where('follower_id', $user->id)->get();
        $followeeIds = [];

        foreach ($followings as $followee) {
            array_push($followeeIds, $followee->followee_id);
        }

        return $followeeIds;
    }
}
