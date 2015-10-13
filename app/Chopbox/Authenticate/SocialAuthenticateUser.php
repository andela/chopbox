<?php

/**
 * Created by PhpStorm.
 * User: bendozy
 * Date: 8/19/15
 * Time: 11:20 AM
 */
namespace ChopBox\ChopBox\Authenticate;

use Request;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use ChopBox\ChopBox\Repository\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class SocialAuthenticateUser {

  use AuthenticatesAndRegistersUsers;

  /**
   * Store users details
   * @var UserRepository
   */
  private $users;

  public function __construct(UserRepository $users) {
    $this->users = $users;
  }

  public function execute($request, $listener, $provider) {

    if (! $request->all()) {
      return $this->getAuthorizationFirst($provider);
    }
    elseif ( isset($request->all() ['errors'])) {
      return redirect('/login')->withErrors('Error authenticating with ' . $provider);
    }
    else {
      $userSocialDetails = $this->getSocialMediaProfile($provider);
      $user = $this->users->findUserByEmail($userSocialDetails->email);

      if ($user) {
        Auth::loginUsingId($user->id, true);

        return redirect()->intended('/');
      }
      else {
        session([
            'socialUser' => $userSocialDetails
        ]);

        return redirect()->intended('/social_password');
      }
    }
  }

  private function getAuthorizationFirst($provider) {
    return Socialite::driver($provider)->redirect();
  }

  private function getSocialMediaProfile($provider) {
    return Socialite::driver($provider)->user();
  }

}