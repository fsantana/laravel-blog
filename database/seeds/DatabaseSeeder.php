<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

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

        factory('App\User')->create(
            [
                'name' => 'Fernando',
                'email' => 'fernandosantanajr@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10)
            ]
        );


        // $this->call(UserTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TagTableSeeder::class);

        Model::reguard();
    }
}
