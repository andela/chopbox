<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 8/7/15
 * Time: 7:50 AM
 */
use Faker\Factory;
use ChopBox\Favourite;
use Illuminate\Database\Seeder;
class FavouritesTableSeeder extends Seeder {


    public function run() {
        $faker = Factory::create();
        //Favourite::truncate();

        foreach(range(1,50) as $index) {
            Favourite::create([
                'chops_id' => $faker->numberBetween(1,50)
            ]);
        }
    }

}

