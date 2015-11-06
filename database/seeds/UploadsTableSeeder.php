<?php
/**
 * Created by PhpStorm.
 * User: andela
 * Date: 8/7/15
 * Time: 12:19 PM
 */
use ChopBox\Upload;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UploadsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        Upload::truncate();

        foreach (range(1, 50) as $index) {
            Upload::create([
                'name' => $faker->name,
                'file_uri' => $faker->imageUrl(),
                'chop_id' => $faker->numberBetween(1, 50),
                'mime_type' => 'image/jpeg'
            ]);
        }
    }
}
