<?php
use ChopBox\User;
use Illuminate\Support\Facades\Hash;
class UserTest extends \Codeception\TestCase\Test {
	
	/**
	 *
	 * @var \UnitTester
	 */
	protected $tester;
	
	/**
	 */
	public function testRegister() {
		$email = 'johndoe@example.com';
		$password = Hash::make ( 'password' );
		$username = 'johndoe';
		$status = TRUE;
		$profile_state = FALSE;
		
		User::create ( [ 
				'email' => $email,
				'password' => $password,
				'username' => $username,
				'status' => $status,
				'profile_state' => $profile_state 
		] );
		
		$this->tester->seeRecord ( 'users', [ 
				'email' => $email,
				'username' => $username, 'password' => $password]);
		}

}