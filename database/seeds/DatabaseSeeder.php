<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();
        $this->call(UserTableSeeder::class);

        DB::table('chops')->delete();
        $this->call(ChopsTableSeeder::class);


        DB::table('comments')->delete();
        $this->call(CommentTableSeeder::class);

        DB::table('favourites')->delete();
        $this->call(FavouritesTableSeeder::class);

        DB::table('user_roles')->delete();
        $this->call(UserRoleTableSeeder::class);

        DB::table('follows')->delete();
        $this->call(FollowsTableSeeder::class);

        DB::table('uploads')->delete();
        $this->call(UploadsTableSeeder::class);

        Model::reguard();
    }
}
