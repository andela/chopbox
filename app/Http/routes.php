<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */

Route::get('/', ['middleware'=>'home', 'uses' => 'HomeController@index']);

Route::get('help', 'HelpAndPrivacyController@help');

Route::get('privacy', 'HelpAndPrivacyController@privacy');

Route::controllers([
    'password' => 'Auth\PasswordController'
]);

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@doLogin');

Route::get('logout', 'Auth\AuthController@getLogout');


// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Set Social Password routes...
Route::get('social_password', 'Auth\AuthController@getSocialPassword');
Route::post('social_password', 'Auth\AuthController@postSocialPassword');

/*
 * Password reset routes.
 */
Route::get('/password/email', 'Auth/PasswordController@getEmail');
Route::post('/password/reset/{token}', 'Auth/PassWordController@postEmail');


Route::get('login/{provider?}', 'Auth\AuthController@socialLogin');


Route::resource('chops', 'ChopsController');

Route::post('profile_complete', 'HomeController@firstProfile');

