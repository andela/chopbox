<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 8/6/15
 * Time: 2:19 PM
 */
use Illuminate\Database\Seeder as Seeder;
use Faker\Factory as Factory;
use ChopBox\Chop;
class ChopsTableSeeder extends  Seeder {


    public function run() {
        $faker = Factory::create();
        Chop::truncate();
        Chop::create([
            'chops_name' => $faker->word,
            'about' => $faker->sentences(3),
            'user_id' => $faker->numberBetween(0,50),
            'likes' => $faker->numberBetween(0,50)
        ]);
    }
}