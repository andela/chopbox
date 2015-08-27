<?php
/**
 * Created by PhpStorm.
 * User: bendozy
 * Date: 8/19/15
 * Time: 11:20 AM
 */

namespace ChopBox\Authenticate;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use ChopBox\Helpers\UserRepository;
use Request;

class SocialAuthenticateUser {
		use AuthenticatesAndRegistersUsers;

		private $users;

		public function __construct(UserRepository $users) {
			 $this->users = $users;
		}

		public function execute($request, $listener, $provider) {

				if (!$request->all()){
						return $this->getAuthorizationFirst($provider);
				}elseif(isset($request->all()['errors'])){
						return redirect ('/login')->withErrors('Error authenticating with '.$provider);
				}else{
						$socialUser = $this->getSocialUser($provider);
						$user = $this->users->findUserByEmail($socialUser->email);
						if($user){
								Auth::loginUsingId($user->id,true);

        if(Auth::check()){
										return redirect()->intended('/');
								}
						}else{
								session(['socialUser' => $socialUser]);
								return redirect()->intended('/social_password');
 					}


				}

		}

		private function getAuthorizationFirst($provider) {
				return Socialite::driver($provider)->redirect();
		}

		private function getSocialUser($provider) {
				return Socialite::driver($provider)->user();
		}
}