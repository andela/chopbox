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

}
