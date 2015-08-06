<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('test if chops can be displayed on the home page after posting');
$I->expectTo('have a registered user in the database');
$user_id = $I->haveRecord('users', [
    'username' => 'John Doe',
    'password' => 'johndope',
    'email'=> 'john@doe.com',
    'profile_state' => 0
]);
$I->expectTo('have a chops record in the database');
$I->haveRecord('chops',[
    'chops_name' => 'A new name',
    'about' =>'About this chops',
    'user_id' => $user_id,
    'likes' => 0
]);

$I->expectTo('have the action take place in the controller');
$I->amOnAction('ChopsController@index');
$I->seeInCurrentUrl('/chops');
$I->see('About this chops');
$I->see('A new name');



