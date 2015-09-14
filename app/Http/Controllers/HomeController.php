<?php

namespace ChopBox\Http\Controllers;

use ChopBox\ChopBox\Repository\ChopsRepository;
use ChopBox\ChopBox\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Validator;
use ChopBox\Http\Requests;
use ChopBox\Http\Requests\ProfileRequest;
use ChopBox\User;
use ChopBox\Follow;
use ChopBox\ChopBox\Repository\ChopRepository;

class HomeController extends Controller
{
    /**
     * Show the application dashboard to a logged-in user.
     *
     * @param UserRepository $userRepository
     *
     * @param ChopsRepository $chopsRepository
     *
     * @return \Illuminate\View\View
     */
    public function index(UserRepository $userRepository, ChopsRepository $chopsRepository)
    {
        $user = Auth::user();

        // Find and order the users that have the highest number of chops
        $topTen =  $userRepository->topUsers();

        // Find followee ids
        $followeeIds = $this->getFolloweeIds($user);

        // Get chops of logged-in user and that of those (s)he follows
        $chops = $chopsRepository->getChops($user, $followeeIds);

        return view('homepage', compact('user', 'chops', 'topTen'));
    }

    /**
     * Check if a user has completed the profile details.
     *
     * @param ProfileRequest $request
     *
     * @param UserRepository $userRepository
     *
     * @param ChopsRepository $chopRepository
     *
     * @return \Illuminate\View\View
     */
    public function firstProfile(ProfileRequest $request, UserRepository $userRepository, ChopsRepository $chopRepository)
    {
        $user = Auth::user();

        $this->saveUser($user, $request);

      // Find and order the users that have the highest number of chops
      $topTen =  $userRepository->topUsers();

      // Find followee ids
      $followeeIds = $this->getFolloweeIds($user);

      // Get chops of logged-in user and that of those (s)he follows
      $chops = $chopRepository->getChops($user, $followeeIds);

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
