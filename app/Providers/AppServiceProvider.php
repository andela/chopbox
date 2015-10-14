<?php

namespace ChopBox\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
		Validator::extend('invalid', function ($attribute, $value, $parameters, $validator){
			$invalidNames = array(
				"help",
				"privacy",
				"about",
				"terms",
				"password",
				"login",
				"logout",
				"register",
				"social_password",
				"chops",
				"profile_complete",
				"username"
			);

			if(in_array(strtolower($value), $invalidNames)) {
				return false;
			}

			return true;
		});

	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
