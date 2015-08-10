<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('register a user');

$I->amOnPage('/register');
$I->fillField('name', 'Jo');
$I->fillField('email', 'example');
$I->fillField('password', 'pass');
$I->fillField('password_confirmation', 'pass');
$I->click('button[type=submit]');
$I->seeFormHasErrors();
$I->seeCurrentUrlEquals('/register');
$I->seeFormErrorMessages(
		array('email'=>'The email must be a valid email address.',
			    	'name'=>'The name must be at least 3 characters.',
				    'password' => 'The password must be at least 8 characters.'

));
$I->dontSeeRecord('users', ['email' => 'example']);

$I->expectTo('register a user with a mismatching password');
$I->fillField('name', 'Johndoe');
$I->fillField('email', 'example@example.com');
$I->fillField('password', 'passee');
$I->fillField('password_confirmation', 'pass');
$I->click('button[type=submit]');
$I->seeFormHasErrors();
$I->seeCurrentUrlEquals('/register');
$I->seeFormErrorMessage('password' , 'The password confirmation does not match.');
$I->dontSeeRecord('users', ['email' => 'example@example.com']);

$I->expectTo('register a user with existing username and email');
$I->haveRecord('users', [
		'email' =>  'andela@andela.com',
		'username' => 'andelabendozy',
		'password' => bcrypt('password'),
		'created_at' => new DateTime(),
		'updated_at' => new DateTime(),
		'status' =>TRUE,
		'profile_state' => FALSE
]);
$I->fillField('name', 'andelabendozy');
$I->fillField('email', 'andela@andela.com');
$I->fillField('password', 'password');
$I->fillField('password_confirmation', 'password');
$I->click('button[type=submit]');
$I->seeFormErrorMessages(
		array(
				'email'=>'The email has already been taken.',
				'name'=>'The name has already been taken.',
		));


$I->expectTo('register a user with the correct details');
$I->fillField('name', 'andela');
$I->fillField('email', 'andelatest@andela.com');
$I->fillField('password', 'password');
$I->fillField('password_confirmation', 'password');
$I->click('button[type=submit]');
$I->amOnPage('/');
$I->seeAuthentication();
$I->seeRecord('users', ['email' => 'andelatest@andela.com','username' => 'andela']);
$I->logout();
$I->dontSeeAuthentication();
