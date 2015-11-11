<?php

namespace ChopBox\Http\Controllers;

use ChopBox\User;
use ChopBox\Follow;
use ChopBox\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use ChopBox\ChopBox\Repository\UserRepository;

class FollowController extends Controller
{
    /**
     * Retrieve all the users a particular user is following
     *
     * @param UserRepository $userRepository
     * @return array
     */
    public function getFollowees(UserRepository $userRepository)
    {
        $user_id = Input::get('user_id');
        $logged_in_user_id = Auth::user()->id;

        if ($user_id == $logged_in_user_id) {
            return ['logged_in_user_id' => $logged_in_user_id, 'follows' => User::whereIn('id', $userRepository->getFolloweeIds($user_id))->get()];
        } else {
            $followees = User::whereIn('id', $userRepository->getFolloweeIds($user_id))->get();
            $followStatuses = [];

            foreach ($followees as $followee) {
                array_push($followStatuses, $this->getFollowStatus($logged_in_user_id, $followee->id));
            }
        }

        return ['logged_in_user_id' => $logged_in_user_id, 'follows' => $followees, 'followStatuses' => $followStatuses];
    }

    /**
     * Retrieve all the users following a particular user
     *
     * @param UserRepository $userRepository
     * @return array
     */
    public function getFollowers(UserRepository $userRepository)
    {
        $logged_in_user_id = Auth::user()->id;
        $followers = User::whereIn('id', $userRepository->getFollowerIds(Input::get('user_id')))->get();
        $followStatuses = [];

        foreach ($followers as $follower) {
            array_push($followStatuses, $this->getFollowStatus($logged_in_user_id, $follower->id));
        }

        return ['logged_in_user_id' => $logged_in_user_id, 'follows' => $followers, 'followStatuses' => $followStatuses];
    }

    /**
     * Check if the logged-in user is following a particular user
     *
     * @return string
     */
    public function checkFollowStatus()
    {
        return $this->getFollowStatus(Auth::user()->id, Input::get('followee_id'));
    }

    /**
     * Handle following and unfollowing
     *
     * @return mixed
     */
    public function followOrUnfollow()
    {
        $follower = Auth::user();
        $followee = User::find(Input::get('followee_id'));

        if (Follow::where('follower_id', $follower->id)->where('followee_id', $followee->id)->first()) {
            $this->unfollow($follower, $followee);
        } else {
            $follow = new Follow;
            $this->follow($follower, $followee, $follow);
        }

        return $follower->followings_count;
    }

    /**
     * Implement follow feature
     *
     * @param $follower
     * @param $followee
     * @param Follow $follow
     */
    protected function follow($follower, $followee, Follow $follow) {
        $follow->follower_id = $follower->id;
        $follow->followee_id = $followee->id;
        $follow->save();

        $follower->followings_count++;
        $follower->save();

        $followee->followers_count++;
        $followee->save();
    }

    /**
     * Implement unfollow feature
     *
     * @param $follower
     * @param $followee
     */
    protected function unfollow($follower, $followee)
    {
        Follow::where('follower_id', $follower->id)
                ->where('followee_id', $followee->id)->delete();

        $follower->followings_count--;
        $follower->save();

        $followee->followers_count--;
        $followee->save();
    }

    /**
     * Check if a user is following another particular user
     *
     * @param $follower_id
     * @param $followee_id
     * @return string
     */
    protected function getFollowStatus($follower_id, $followee_id)
    {
        $status = Follow::where('follower_id', $follower_id)
                        ->where('followee_id', $followee_id)->first();

        return $status ? "YES" : "NO";
    }
}
