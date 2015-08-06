<?php


class UploadTest extends \Codeception\TestCase\Test
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
 public function testUploadDetailsCanBeSaved() {
     $chops_id = $this->createChops();
     $upload = new \ChopBox\Upload();

     $upload->chops_id = $chops_id;
     $upload->mime_type = "image/jpg";
     $upload->file_uri = 'blablabla';
     $upload->name = "filename";

     $upload->save();

     $this->tester->seeRecord('uploads', ['name'=>'filename']);
 }


 public function testUploadCanBeDeleted() {
     $chops_id = $this->createChops();
     $id = $this->tester->haveRecord('uploads', [
         'chops_id'=> $chops_id,
         'mime_type'=> 'image/jpg',
         'file_uri'=> 'bla',
         'name' => 'a name'
     ]);

     $upload = \ChopBox\Upload::find($id);
     $upload->delete();

     $this->tester->dontSeeRecord('uploads', ['name'=> 'a name']);
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
        'email' => 'johndoe@johndoe.com',
        'profile_state' => 0
    ]);


    return $user_id;
}
}