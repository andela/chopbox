<?php

namespace ChopBox\ChopBox\Repository;

use ChopBox\Chop;
use ChopBox\User;
use ChopBox\Favourite;

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

    public function getFavourites($chopId)
    {
        return Favourite::where('chop_id', $chopId)->count();
    }

    public function addLikeToChop($id)
    {
        $chop = Chop::find($id);
        $chop->likes += 1;
        $chop->save();
    }
}
