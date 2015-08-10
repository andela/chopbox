<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('register a user from index page');
$I->expectTo('have a users in the database');
$I->amOnPage('/');
$I->haveRecord('users', [
		'email' =>  'andela@andela.com',
		'username' => 'andelabendozy',
		'password' => bcrypt('password'),
		'created_at' => new DateTime(),
		'updated_at' => new DateTime(),
		'status' =>TRUE,
		'profile_state' => FALSE
]);
$I->submitForm('form#register', [
		'name' => 'prosper',
		'email' => 'andela11@andela.com',
		'password' => '12345678',
		'password_confirmation' => '12345678'
]);
$I->seeAuthentication();
$I->seeCurrentUrlEquals('');
$I->seeRecord('users', ['email' => 'andela@andela.com']);
$I->seeAuthentication();
$I->wantTo('logout');
$I->logout();
$I->dontSeeAuthentication();