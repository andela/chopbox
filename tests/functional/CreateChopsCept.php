<?php
$I = new FunctionalTester($scenario);
//$I->expectTo('have a user in the database');
$id = $I->haveRecord('users', [
    'username'=>'Dugeri',
    'password' => 'danverem',
    'email' => 'verem.dugeri@gmail.com',
    'profile_state' => 1
]);
//$I->expectTo('have a logged in user');
$user = $I->grabRecord('users', ['username'=>'Dugeri']);
////$I->dontSee('Login');
$I->amHttpAuthenticated('kola', $user->password);
$user = \ChopBox\User::find($id);
$I->amLoggedAs($user);
$I->wantTo('test if chops is posting to database');
$I->amOnAction('ChopsController@index');
$I->dontSeeRecord('uploads', array('name' => 'suya.jpeg'));
$I->dontSeeRecord('uploads', array('name' => 'hamburger.jpg'));
$I->dontSeeRecord('chops', array('about' => 'This food is the best dish in the country'));
//$I->seeInCurrentUrl('/create');
$I->submitForm('#my-form', [
    'about' => 'This food is the best dish in the country',
    'image' => [
        'suya.jpeg',
        'hamburger.jpg',
        'ijekuje.jpg',
        'flower.jpg',
        'food.jpg']
    ]);
$I->seeRecord('chops', array('about' => 'This food is the best dish in the country'));
$I->seeRecord('uploads', array('name' => 'suya.jpeg'));
$I->seeRecord('uploads', array('name' => 'hamburger.jpg'));

//$I->fillField('about','This food is the best dish in the country');
//$I->attachFile('image', ['dodo.jpg', 'hamburger.jpg', 'ijekuje.jpg']);
//$I->click('Post');
//$I->seeInCurrentUrl('/chops');
