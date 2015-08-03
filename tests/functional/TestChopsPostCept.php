<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('test if chops is posting to database');
$I->amOnPage('/create');
$I->seeInCurrentUrl('/create');
$I->fillField('name', 'edikaikong');
$I->fillField('description','This food is the best dish in the country');
$I->click('submitButton');
$I->seeInCurrentUrl('/chops');
$I->haveInDatabase('chops', ['name'=>'edikaikong']);

