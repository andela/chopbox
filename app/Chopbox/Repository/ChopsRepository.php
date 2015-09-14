<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 9/14/15
 * Time: 11:35 AM
 */

namespace ChopBox\ChopBox\Repository;

use ChopBox\Chop;

class ChopsRepository {



	public function getUserChops(User $user, array $followeeIds)
	{
		return Chop::whereIn('user_id', $followeeIds)
				->orWhere('user_id', $user->id)->latest()->get();
	}
}