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

     /**
     * @param $chopId
     * @return mixed
     */
     public function getFavourites($chopId)
     {
        return Favourite::where('chop_id', $chopId)->count();
     }

     /**
     * @param $id
     */
     public function addLikeToChop($id)
     {
        $chop = Chop::find($id);
        $chop->likes += 1;
        $chop->save();
     }

     /**
     * @param $id
     * @param User $user
     * @return bool
     */
     public function userAlreadyLiked($id,User $user)
     {
        $liked = Favourite::where('chop_id', $id)
            ->where('user_id', $user->id)->count();

        return  ($liked > 0) ? true : false;
     }

     /**
     * @param $chopId
     * @param $user
     * @return mixed
     */
     public function removeFavourite($chopId, $user)
     {
        Favourite::where('chop_id', $chopId)
            ->where('user_id', $user->id)->delete();

        $chop = Chop::find($chopId);
        $chop->likes -= 1;
        $chop->save();

        return $this->getFavourites($chopId);
     }
}
