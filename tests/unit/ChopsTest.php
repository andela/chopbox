<?php

use ChopBox\Chop as Chop;


class ChopsTest extends \Codeception\TestCase\Test
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
   public function testChopsCanBeSaved(){

       // User must exist to be able to create a chop

       $chops_id = $this->createChops();

       $this->tester->seeRecord('chops',['id'=>$chops_id]);
   }

    public function  testChopsCanBeDeleted() {

        $chops_id = $this->createChops();

        $chops = Chop::find($chops_id);
        $chops->delete();

        $this->tester->dontSeeRecord('chops', ['id'=>$chops_id]);
    }

    public function testChopsCanBeUpdated() {
        $id = $this->createChops();

        $chops = Chop::find($id);
        $chops->chops_name = "A new name";

        $chops->save();

        $this->tester->seeRecord('chops', ['chops_name'=>'A new name']);
        $this->tester->dontSeeRecord('chops', ['chops_name' => 'Random name']);
    }

    private function createChops() {
        $user_id = $this->createUser();
        $id = $this->tester->haveRecord('chops', [
            'user_id' => $user_id,
            'about' => 'About this chops',
            'likes' => 5
        ]);


        return $id;
    }

    private function createUser() {
        $user_id = $this->tester->haveRecord('users', [
            'username' =>'johndoe',
            'password'=> 'password',
            'email' => 'john@doe.com',
            'profile_state' => 0
        ]);


        return $user_id;
    }
}