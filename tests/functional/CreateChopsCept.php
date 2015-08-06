<?php 
$I = new FunctionalTester($scenario);
$I->expectTo('have a usere in the database');
$I->haveRecord('users', [
    'username'=>'verem',
    'password' => 'danverem',
    'email' => 'danverem@gmail.com',
    'profile_state' => 0
]);
$I->expectTo('have a logged in user');
$user = $I->grabRecord('users', ['username'=>'verem']);
$I->amLoggedAs(['username'=> $user->username, 'id' => $user->id, 'password' => $user->password]);
$I->wantTo('test if chops is posting to database');
$I->amOnAction('ChopsController@create');
$I->seeInCurrentUrl('/create');
$I->see('What\'s that special meal you just ate today');
$I->fillField('name', 'edikaikong');
$I->attachFile('image', 'julia.jpeg');
$I->fillField('about','This food is the best dish in the country');
$I->click('submitButton');
$I->seeInCurrentUrl('/chops');
