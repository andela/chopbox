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

/*
 * |--------------------------------------------------------------------------
 * |Pages Routes
 * |--------------------------------------------------------------------------
 */
Route::get('/', ['middleware'=>'home', 'uses' => 'HomeController@index']);

Route::get('help', 'HelpAndPrivacyController@help');

Route::get('privacy', 'HelpAndPrivacyController@privacy');

Route::get('about', 'AboutTermsController@about');

Route::get('terms', 'AboutTermsController@terms');


/*
 * |--------------------------------------------------------------------------
 * |Authentication Routes
 * |--------------------------------------------------------------------------
 */
Route::get('login', 'Auth\AuthController@getLogin');

Route::post('login', 'Auth\AuthController@doLogin');

Route::get('logout', 'Auth\AuthController@getLogout');


/*
 * |--------------------------------------------------------------------------
 * |Registration Routes
 * |--------------------------------------------------------------------------
 */
Route::get('register', 'Auth\AuthController@getRegister');

Route::post('register', 'Auth\AuthController@postRegister');

Route::get('login/{provider?}', 'Auth\AuthController@socialLogin');


/*
 * |--------------------------------------------------------------------------
 * |Social Password Routes
 * |--------------------------------------------------------------------------
 */
Route::get('social_password', 'Auth\AuthController@getSocialPassword');

Route::post('social_password', 'Auth\AuthController@postSocialPassword');


/*
 * |--------------------------------------------------------------------------
 * |Password Reset Routes
 * |--------------------------------------------------------------------------
 */
Route::get('/password/email', 'Auth\PasswordController@getEmail');

Route::post('/password/reset/{token}', 'Auth\PassWordController@postEmail');

Route::controllers([
    'password' => 'Auth\PasswordController'
]);


/*
 * |--------------------------------------------------------------------------
 * |Comment Route
 * |--------------------------------------------------------------------------
 */
Route::post('comment', 'CommentController@addComment');


Route::post('comment/delete/{id}', [
    'uses' => 'CommentController@destroy',
    'as'    => 'comment.delete',
    'middleware' => ['auth']
]);

Route::get('comment/{id}', [
    'uses'          => 'CommentController@find',
    'as'            => 'comment.find',
    'middleware'    => ['auth']
]);

Route::post('comment/edit/{id}', [
    'uses'      => 'CommentController@update',
    'as'        => 'comment.update',
    'middleware' => ['auth']
]);


/*
 * |--------------------------------------------------------------------------
 * |Follow and Unfollow Routes
 * |--------------------------------------------------------------------------
 */
Route::get('followees', 'FollowController@getFollowees');

Route::get('followers', 'FollowController@getFollowers');

Route::get('follow_status', 'FollowController@checkFollowStatus');

Route::get('follow', 'FollowController@followOrUnfollow');


/*
 * |--------------------------------------------------------------------------
 * | User Profile Routes
 * |--------------------------------------------------------------------------
 */
Route::post('profile_complete', 'HomeController@firstProfile');

Route::get('profile/{id}', [
    'uses'           => 'UserProfileController@edit',
    'as'             =>  'user.profile',
    'middleware'     => ['auth']
]);

Route::post('profile/{id}', [
    'uses'          => 'UserProfileController@update',
    'as'            => 'profile.update',
    'middleware'    => ['auth']
]);

Route::get('user/{id}', [
    'uses'      => 'UserProfileController@show',
    'as'        => 'user.show',
    'middleware'=> ['auth']
]);


/*
 * |--------------------------------------------------------------------------
 * |Chops Routes
 * |--------------------------------------------------------------------------
 */
Route::resource('chops', 'ChopsController');

Route::post('chops/favourite/{id}',[
    'uses'      => 'ChopsController@favourite',
    'as'        => 'chops.favourite',
    'middleware'=> ['auth']
]);

Route::put('editChop', 'ChopsController@update');

Route::delete('deleteChop', 'ChopsController@destroy');


/*
 * |--------------------------------------------------------------------------
 * |Messaging Routes
 * |--------------------------------------------------------------------------
 */

Route::post('/message', [
    'uses'      => 'MessagesController@store',
    'as'        => 'message.send',
    'middleware'=> ['auth']
]);

Route::get('messages', [
    'uses'      => 'MessagesController@show',
    'as'        => 'messages.get',
    'middleware'=> ['auth']
]);

Route::get('messages/image', [
    'uses'      => 'MessagesController@senderImage',
    'as'        => 'sender.image',
    'middleware'=> ['auth']
]);

