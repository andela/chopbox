<?php
$I = new FunctionalTester($scenario);
$I->wantTo('login as a user');

$I->haveRecord('users', [
		'email' =>  'john@doe.com',
		'username' => 'johndoe',
		'password' => bcrypt('password'),
		'created_at' => new DateTime(),
		'updated_at' => new DateTime(),
		'status' =>TRUE,
		'profile_state' => FALSE
]);
$I->amOnPage('/login');
$I->fillField('email', 'john@doe.c');
$I->fillField('password', 'password');
$I->click('button[type=submit]');
$I->seeFormHasErrors();
$I->seeFormErrorMessage(null,'These credentials do not match our records.');
$I->dontSeeAuthentication();
$I->amOnPage('/login');
$I->fillField('email', 'john@doe.com');
$I->fillField('password', 'password');
$I->click('button[type=submit]');
$I->amOnPage('/');
$I->seeAuthentication();
$I->logout();
