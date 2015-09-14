<?php

namespace ChopBox\ChopBox\Repository;

use ChopBox\User;

class UserRepository
{
    public function findUserByEmail($email)
    {
        return $user = User::where('email', '=', $email)->first();
    }

    public function topUsers()
    {
        return User::orderBy('chops_count', 'DESC')->take(10)->get();
    }
}
