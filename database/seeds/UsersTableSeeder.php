<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $password;

        DB::table('users')->truncate();
        $faker = Faker\Factory::create('en_EN');

        DB::table('users')->insert(
            [
                'name' => 'admin',
                //'email' => "va2dim@gmail.com",
                //'password' => $password ?: $password = bcrypt('213sks'),
                //'remember_token' => str_random(10),
            ]
        );

        foreach (range(1, 15) as $index) {
            DB::table('users')->insert(
                [
                    'name' => $faker->firstName.' '.$faker->lastName,
                    //'email' => $faker->unique()->email,
                    //'password' => $password ?: $password = bcrypt('123456'),
                    //'remember_token' => str_random(10),
                    'ip_address' => $faker->ipv4,
                    'user_agent' => $faker->userAgent,
                ]
            );
        }
    }
}
