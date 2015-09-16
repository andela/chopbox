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

class ChopsTableSeeder extends  Seeder
{
    public function run()
    {
        $faker = Factory::create();
        //Chop::truncate();
        foreach (range(1, 50) as $index) {
            Chop::create([
                'chops_name' => $faker->word,
                'about' => $faker->text,
                'user_id' => $faker->numberBetween(1, 50),
                'likes' => $faker->numberBetween(1, 50)
            ]);
        }
    }
}
