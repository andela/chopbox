<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 8/6/15
 * Time: 1:55 PM
 */

use Illuminate\Database\Seeder;
use ChopBox\User;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        //User::truncate();
        foreach (range(1, 50) as $index) {
            User::create([
                'username' => $faker->userName,
                'password' => $faker->password(8, 20),
                'email' => $faker->email,
                'profile_state' => $faker->boolean(),
                'image_uri' => $faker->imageUrl(),
                'followers_count' => $faker->numberBetween(1, 50),
                'followings_count' => $faker->numberBetween(1, 50)
            ]);
        }
    }
}
