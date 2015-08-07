<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 8/7/15
 * Time: 8:09 AM
 */
use Illuminate\Database\Seeder;
use Faker\Factory;
use ChopBox\UserRole;
class UserRoleTableSeeder extends Seeder {

    public $timestamps = false;
    public function run() {

        $faker = Factory::create();
        //UserRole::truncate();

        foreach(range(1,50) as $index) {
            UserRole::create([
                'user_id' => $faker->numberBetween(1,50),
                'role_id' => $faker->numberBetween(1,3)
            ]);
        }
    }
}