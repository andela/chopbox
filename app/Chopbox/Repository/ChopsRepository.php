<?php

namespace ChopBox\ChopBox\Repository;

use ChopBox\Chop;
use ChopBox\User;

class ChopsRepository
{
    public function getChops(User $user, array $followeeIds)
    {
        return Chop::whereIn('user_id', $followeeIds)
                ->orWhere('user_id', $user->id)->latest()->get();
    }
}
