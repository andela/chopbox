<?php
$I = new FunctionalTester($scenario);
$I->expectTo('have a user in the database');
$id = $I->haveRecord('users', [
    'username'=>'Dugeri',
    'password' => 'danverem',
    'email' => 'verem.dugeri@gmail.com',
    'profile_state' => 0
]);

$user = \ChopBox\User::find($id);
$I->amLoggedAs($user);

$I->wantTo('test if chops is posting to database');
$I->amOnAction('ChopsController@index');
$I->dontSeeRecord('uploads', ['name' => 'suya.jpeg']);
$I->dontSeeRecord('uploads', ['name' => 'hamburger.jpg']);
$I->dontSeeRecord('chops', ['about' => 'This food is the best dish in the country']);


$I->fillField('about','This food is the best dish in the country');
$I->attachFile('image[]', 'suya.jpeg', 'hamburger.jpg');

$I->click('Post');

$I->seeRecord('chops', ['about' => 'This food is the best dish in the country']);
$I->seeRecord('uploads', ['name' => 'suya.jpeg']);

