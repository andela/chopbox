<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 8/7/15
 * Time: 7:59 AM
 */
use ChopBox\Follow;
use Illuminate\Database\Seeder;
use Faker\Factory;
class FollowsTableSeeder extends Seeder {


    public function run() {
        $faker = Factory::create();
        //Follow::truncate();

        foreach(range(1,50) as $index) {
            Follow::create([
                'follower_id' =>$faker->numberBetween(1,50),
                'followee_id' =>$faker->numberBetween(1,50)
            ]);
        }
    }
}