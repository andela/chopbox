<?php


class UserRoleTest extends \Codeception\TestCase\Test
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
    public function testUserRoleCanBeAssigned() {
        $user_id = $this->createUser();
        $role_id = $this->createRole();

        $role = new \ChopBox\UserRole();
        $role->user_id = $user_id;
        $role->role_id = $role_id;

        $role->save();


        $this->tester->seeRecord('user_roles', ['role_id'=> $role_id]);
        $this->tester->seeRecord('user_roles', ['user_id'=> $user_id]);

    }


    public function testUserRoleCanBeDeleted() {
        $user_id = $this->createUser();
        $role_id = $this->createRole();
        $id = $this->tester->haveRecord('user_roles',[
            'user_id'=> $user_id,
            'role_id' => $role_id
        ]);

        $user_role = \ChopBox\UserRole::find($id);

        $user_role->delete();
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

    private function createRole(){
        $id = $this->tester->haveRecord('roles',[
            'role_name' =>'user'
        ]);

        return $id;
    }
}