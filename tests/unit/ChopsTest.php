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

       //user must exist to be able to create a chops
       $id = $this->createUser();

       $chops = new Chop();
       $chops->chops_name = "Random";
       $chops->about = "A random chops";
       $chops->user_id = $id;
       $chops->likes = 0;

       $chops->save();

       $this->tester->seeRecord('chops',['chops_name'=>'Random']);
   }

    public function  testChopsCanBeDeleted() {

       $id = $this->createChops();


        $chops = Chop::find($id);
        $chops->delete();

        $this->tester->dontSeeRecord('chops', ['chops_name'=> 'Random name']);
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
            'chops_name' =>'Random name',
            'about' => 'About this chops',
            'likes' => 0
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