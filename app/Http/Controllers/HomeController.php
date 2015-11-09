<?php

namespace ChopBox\Http\Controllers;

use ChopBox\ChopBox\Repository\ChopsRepository;
use ChopBox\ChopBox\Repository\UserRepository;
use ChopBox\Follow;
use ChopBox\Http\Requests;
use ChopBox\Http\Requests\ProfileRequest;
use ChopBox\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;

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
        $topTen = $userRepository->topUsers();

        // Find followee ids
        $followeeIds = $this->getFolloweeIds($user);

        // Get chops of logged-in user and that of those (s)he follows
        $chops = $chopsRepository->getChops($user, $followeeIds);

        return view('pages.homepage', compact('user', 'chops', 'topTen'));
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
        $topTen = $userRepository->topUsers();

        // Find followee ids
        $followeeIds = $this->getFolloweeIds($user);

        // Get chops of logged-in user and that of those (s)he follows
        $chops = $chopRepository->getChops($user, $followeeIds);

        //return view('homepage', compact('user', 'chops', 'topTen'));
        return redirect('/')->with(compact('user', 'chops', 'topTen'));
    }

    private function saveUser(User $user, ProfileRequest $request)
    {
        $user->profile_state = true;
        $user->firstname = trim($request ['firstname']);
        $user->lastname = trim($request ['lastname']);
        $user->location = trim($request ['location']);
        $user->about = trim($request ['about']);
        $user->gender = trim($request ['gender']);
        $user->best_food = trim($request ['best_food']);
        $user->image_uri = trim($this->getAvatarUrl($user));
        $user->save();
    }

    private function getFolloweeIds(User $user)
    {
        $followings = Follow::where('follower_id', $user->id)->get();
        $followeeIds = [];

        foreach ($followings as $following) {
            array_push($followeeIds, $following->followee_id);
        }

        return $followeeIds;
    }

    private function getFollowerIds(User $user)
    {
        $followings = Follow::where('followee_id', $user->id)->get();
        $followerIds = [];

        foreach ($followings as $following) {
            array_push($followerIds, $following->follower_id);
        }

        return $followerIds;
    }

    private function getAvatarUrl(User $user)
    {
        return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email))) . "?d=mm&s=120";
    }

    public function follow()
    {
        $follower = Auth::user();
        $followee = User::find(Input::get('followee_id'));

        if(! Follow::where('follower_id', $follower->id)->where('followee_id', $followee->id)->first()) {
            $follow = new Follow;
            $follow->follower_id = $follower->id;
            $follow->followee_id = $followee->id;
            $follow->save();

            $follower->followings_count++;
            $follower->save();

            $followee->followers_count++;
            $followee->save();
        }


        return $follower->followings_count;
    }

    public function unfollow()
    {
        $follower = Auth::user();
        $followee = User::find(Input::get('followee_id'));

        Follow::where('follower_id', $follower->id)
            ->where('followee_id', $followee->id)->delete();

        $follower->followings_count--;
        $follower->save();

        $followee->followers_count--;
        $followee->save();

        return $follower->followings_count;
    }

    public function getFollowees()
    {
        return User::whereIn('id', $this->getFolloweeIds(Auth::user()))->get();
    }

    public function getFollowers()
    {
        return User::whereIn('id', $this->getFollowerIds(Auth::user()))->get();
    }

    public function checkFollowStatus()
    {
        $status = Follow::where('follower_id', Auth::user()->id)
                        ->where('followee_id', Input::get('followee_id'))->first();

        return $status ? "YES" : "NO";
//        $returnVal = (!($status == null)) ? "YES" : "NO";//json_encode(['result' => "YES"]) : json_encode(['result' => "NO"]);

//        return response()->json(['status' => $returnVal]);
    }
}
