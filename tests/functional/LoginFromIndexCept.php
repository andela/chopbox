<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('login as a user from index page with invalid details');
$I->expectTo('fail to login');
$I->amOnPage('/');
$I->submitForm('form#login', [
		'email' => 'andelabendo',
		'password' => 'password',
]);
$I->seeInCurrentUrl('/login');
$I->dontSeeAuthentication();
$I->seeFormHasErrors();
$I->see('These credentials do not match our records.');
$I->wantTo('login as a user from index page with correct details');
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
$I->submitForm('form#login', [
		'email' => 'andelabendozy',
		'password' => 'password',
]);
$I->seeCurrentUrlEquals('');
$I->amOnPage('/');
$I->seeAuthentication();
$I->wantTo('logout');
$I->logout();
$I->dontSeeAuthentication();