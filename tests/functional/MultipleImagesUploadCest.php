<?php
//use \FunctionalTester;

class MultipleImagesUploadCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function testMultipleImagesUploadForAChop(FunctionalTester $I)
    {
        $I->expectTo('have a user in the database');
        $id = $I->haveRecord('users', [
            'username'=>'Dugeri',
            'password' => 'danverem',
            'email' => 'verem.dugeri@gmail.com',
            'profile_state' => 0
        ]);

        $I->wantTo('post with a logged in user');
        $user = \ChopBox\User::find($id);
        $I->amLoggedAs($user);

        $I->expectTo('not to find not yet posted chops in the database');
        $I->dontSeeRecord('uploads', ['name' => 'suya.jpeg']);
        $I->dontSeeRecord('uploads', ['name' => 'hamburger.jpg']);
        $I->dontSeeRecord('chops', ['about' => 'This food is the best dish in the country']);

        $I->wantTo('post a chop with more than one image');
        $I->amOnAction('ChopsController@index');
        $I->fillField('about','This food is the best dish in the country');
        $I->attachFile('image[]', 'suya.jpeg', 'hamburger.jpg');
        $I->click('Post');

        $I->expectTo('find posted chop with all images in the database');
        $I->seeRecord('chops', ['about' => 'This food is the best dish in the country']);
        $I->seeRecord('uploads', ['name' => 'suya.jpeg']);
    }
}
