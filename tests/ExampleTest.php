<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_basic_example()
    {
        $this->visit('/')
             ->see('ChopBox');
    }

    public function test_homepage_loads() {
        $this->visit('/');
    }


    public function test_user_can_post_chops() {

        $uploadedFile = Mockery::mock(
            '\Symfony\Component\HttpFoundation\File\UploadedFile',
            [
                'getClientOriginalName'      => 'image-1.jpg',
                'getClientOriginalExtension' => 'jpg',
            ]
        );

        $this->call('POST', 'ChopsController@store', ['name', ['image' => $uploadedFile], 'about']);
        $this->assertResponseOk();

    }

    public function test_user_can_post_chops_without_image() {
        $this->visit('/chops/create')
            ->type('a random chops', 'name')
            ->type('a random about', 'about')
            ->press('Post')
            ->seeInDatabase('chops', ['name'=>'a random name']);
    }
}
