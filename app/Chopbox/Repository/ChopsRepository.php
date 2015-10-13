<?php

namespace ChopBox\ChopBox\Repository;

use ChopBox\Chop;
use ChopBox\User;

class ChopsRepository
{
    /**
     * Get the Chops that a user and his/her followees have posted
     * @param  User   $user
     * @param  array  $followeeIds
     * @return Collection
     */
    public function getChops(User $user, array $followeeIds)
    {
        return Chop::whereIn('user_id', $followeeIds)
                ->orWhere('user_id', $user->id)->latest()->get();
    }
}
