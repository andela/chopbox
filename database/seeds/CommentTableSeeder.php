<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 8/6/15
 * Time: 4:40 PM
 */
use \Illuminate\Database\Seeder as Seeder;
use \Faker\Factory as Factory;
use ChopBox\Comment as Comment;
class CommentTableSeeder extends  Seeder {


    public function run() {
        $faker = Factory::create();
        //Comment::truncate();

        foreach(range(1,50) as $index) {
            Comment::create([
                'comment' => $faker->text,
                'user_id' => $faker->numberBetween(1,50),
                'chop_id' => $faker->numberBetween(21,50)
            ]);
        }
    }
}