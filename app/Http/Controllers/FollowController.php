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
     * @return mixed
     */
    public function getFollowees(UserRepository $userRepository)
    {
        return User::whereIn('id', $userRepository->getFolloweeIds(Input::get('user_id')))->get();
    }

    /**
     * Retrieve all the users following a particular user
     *
     * @param UserRepository $userRepository
     * @return mixed
     */
    public function getFollowers(UserRepository $userRepository)
    {
        return User::whereIn('id', $userRepository->getFollowerIds(Input::get('user_id')))->get();
    }

    /**
     * Check if a user is following another particular user
     *
     * @return string
     */
    public function checkFollowStatus()
    {
        $status = Follow::where('follower_id', Auth::user()->id)
            ->where('followee_id', Input::get('followee_id'))->first();

        return $status ? "YES" : "NO";
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
}
