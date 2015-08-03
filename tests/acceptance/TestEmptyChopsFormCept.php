<?php 
//test to see if filling for  with errors fails on submission
$I = new AcceptanceTester($scenario);
$I->wantTo('attempt submitting an empcleclearty form');
$I->expectTo('stay on the same page');
$I->amOnPage('/create');
$I->click('submitButton');
$I->expectTo('stay on the same page');
$I->seeInCurrentUrl('/create');
