<?php

namespace ChopBox\ChopBox\Repository;

use ChopBox\User;
use ChopBox\Follow;

class UserRepository
{
    /**
     * Find Users by their Emails
     * @param  string $email
     * @return Collection
     */
    public function findUserByEmail($email)
    {
        return $user = User::where('email', '=', $email)->first();
    }

    /**
     * Find top 10 Users that have posted the most chops
     * @return [type] [description]
     */
    public function topUsers()
    {
        return User::orderBy('chops_count', 'DESC')->take(10)->get();
    }

    /**
     * Retrieve the ID of all the users a particular user is following
     *
     * @param User $user
     * @return array
     */
    public function getFolloweeIds(User $user)
    {
        $followings = Follow::where('follower_id', $user->id)->get();

        return $this->getCollectionOfId($followings, 'followee_id');
    }

    /**
     * Retrieve the ID of all the users following a particular user
     *
     * @param User $user
     * @return array
     */
    public function getFollowerIds(User $user)
    {
        $followings = Follow::where('followee_id', $user->id)->get();

        return $this->getCollectionOfId($followings, 'follower_id');
    }

    /**
     * Get collection of ID
     *
     * @param $followings
     * @param $field
     * @return array
     */
    protected function getCollectionOfId($followings, $field) {
        $Id = [];

        foreach ($followings as $following) {
            array_push($Id, $following->$field);
        }

        return $Id;
    }
}
