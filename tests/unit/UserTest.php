<?php
use ChopBox\User as User;

class UserTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {

    }

    public function testUserCanBeCreated() {
       $user = new User();
        $user->email = "danverem@gmail.com";
        $user->username = "Mills";
        $user->password = "verem";
        $user->profile_state = 0;

        $user->save();

        $this->tester->seeRecord('users', ['username'=> 'Mills']);
     }

    /*
    public function testUsernameCanBeChanged() {
        $id = $this->tester->haveRecord('users',[
            'email' =>'danverem@gmail.com',
            'username' => 'Mills',
            'password' => 'danverem',
            'profile_state' => 0
        ]);

        $user = User::find($id);
        $user->setUsername('Danvery');
        $user->save();
        $this->tester->seeRecord('users', ['username' => 'Danvery']);
        $this->tester->dontSeeRecord('users', ['username' => 'Mills']);
    }
    */

    
}