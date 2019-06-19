<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create('App\Post');
        for ($i=0; $i < 8; $i++) { 
        	DB::table('posts')->insert([
        	'name' => $faker->sentence(),
        	'description' => $faker->sentence(),
        	'created_at' => \Carbon\Carbon::now(),
        	'Updated_at' => \Carbon\Carbon::now(),
        ]);
        }
    }
}
