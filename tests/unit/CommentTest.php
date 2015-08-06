<?php


class CommentTest extends \Codeception\TestCase\Test
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
  public function testCommentCanBeCreated() {
      $chops_id = $this->createChops();

      $chops = \ChopBox\Chop::find($chops_id);
      $comment = new \ChopBox\Comment();
      $comment->comment = "this chops is awesome";
      $comment->user_id = $chops->user_id;
      $comment->chops_id = $chops_id;

      $comment->save();

      $this->tester->seeRecord('comments', ['comment'=> 'this chops is awesome']);
  }

  public function testCommentCanBeEdited() {
      $chops_id = $this->createChops();
      $chops = \ChopBox\Chop::find($chops_id);
      $id = $this->tester->haveRecord('comments', [
          'comment' =>'this chops tastes good',
          'user_id' => $chops->user_id,
          'chops_id'=> $chops_id,
      ]);

      $comment = \ChopBox\Comment::find($id);
      $comment->comment = "this has been updated";
      $comment->save();


      $this->tester->seeRecord('comments', ['comment' => 'this has been updated']);
      $this->tester->dontSeeRecord('comments', ['comment' => 'this chops is awesome']);
  }


    public function testCommentCanBeDeleted() {
        $chops_id = $this->createChops();
        $chops = \ChopBox\Chop::find($chops_id);
       $id = $this->tester->haveRecord('comments', [
            'comment' => "this comment has to be deleted",
            'user_id' => $chops->user_id,
            'chops_id' => $chops->id,
        ]);

        $comment = \ChopBox\Comment::find($id);
        $comment->delete();

        $this->tester->dontSeeRecord('comments', ['comment' =>'this comment has to be deleted']);
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

    private function createComment() {

    }
}