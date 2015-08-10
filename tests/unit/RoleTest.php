<?php


class RoleTest extends \Codeception\TestCase\Test
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
    public function testRoleCanBeCreated()
    {
        $role = new \ChopBox\Role();
        $role->role_name = "admin";
        $role->save();

        $this->tester->seeRecord('roles', ['role_name'=>'admin']);
    }

    public function testRoleCanBeDeleted() {
        $id = $this->tester->haveRecord('roles',[
            'role_name' =>'user'
        ]);

        $role = \ChopBox\Role::find($id);
        $role->delete();

        $this->tester->dontSeeRecord('roles', ['role_name'=>'user']);
    }
}