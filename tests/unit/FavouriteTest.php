<?php


class FavouriteTest extends \Codeception\TestCase\Test
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


    public function testChopsCanBeFavourited() {
        $chops_id = $this->createChops();

        $favourite = new \ChopBox\Favourite();
        $favourite->chops_id = $chops_id;
        $favourite->save();

        $this->tester->seeRecord('favourites',['chops_id'=> $chops_id]);
    }

    public function testChopsCanBeUnfavourited() {
        $chops_id = $this->createChops();

        $id = $this->tester->haveRecord('favourites', ['chops_id'=> $chops_id]);
        $favourite = \ChopBox\Favourite::find($id);

        $favourite->delete();

        $this->tester->dontSeeRecord('favourites', ['chops_id'=> $chops_id]);
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