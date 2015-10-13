<?php

namespace ChopBox\ChopBox\Repository;

use ChopBox\User;

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

}
