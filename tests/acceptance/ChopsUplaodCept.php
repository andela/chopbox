<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('visit the uplaod chops page and be able to post a chops');
$I->amOnPage('/create');
$I->see('What\'s that special meal you just ate today');
$I->fillField('name', 'A random chops with a random name');
$I->fillField('about', 'A random description of this chops');
$I->click('submitButton');
$I->seeInCurrentUrl('/chops');
