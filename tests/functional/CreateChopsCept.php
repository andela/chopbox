<?php
$I = new FunctionalTester($scenario);
$I->expectTo('have a user in the database');
$I->haveRecord('users', [
    'username'=>'Dugeri',
    'password' => 'danverem',
    'email' => 'verem.dugeri@gmail.com',
    'profile_state' => 0
]);
$I->expectTo('have a logged in user');
$user = $I->grabRecord('users', ['username'=>'Dugeri']);
//$I->dontSee('Login');
$I->amHttpAuthenticated('kola', 'secret');
//$I->amHttpAuthenticated($user->username, $user->password);
//$I->amLoggedAs(['username'=> $user->username, 'id' => $user->id, 'password' => $user->password]);

$I->wantTo('test if chops is posting to database');
$I->amOnAction('ChopsController@create');
//$I->seeInCurrentUrl('/create');

$I->fillField('about','This food is the best dish in the country');
$I->attachFile('image[]', 'dodo.jpg', 'hamburger.jpg', 'ijekuje.jpg');
$I->click('Post');
//$I->seeInCurrentUrl('/chops');
