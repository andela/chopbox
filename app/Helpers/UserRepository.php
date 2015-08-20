<?php
/**
 * Created by PhpStorm.
 * User: bendozy
 * Date: 8/19/15
 * Time: 12:40 PM
 */

namespace ChopBox\helpers;

use ChopBox\User;

class UserRepository {

		public function findUserByEmail($email){

				return $user = User::where('email', '=', $email)->first();
		}
} 