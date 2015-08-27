<?php

$I = new FunctionalTester($scenario);
$I->wantTo('register a user from index page');
$I->amOnPage('/');
$I->see('The online community for food lovers');


