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
        DB::table('users')->truncate();
        $faker = Faker\Factory::create('ru_RU');

        foreach (range(1, 15) as $index) {
            DB::table('users')->insert(
                [
                    'name' => $faker->firstName.' '.$faker->lastName,
                    'ip_address' => $faker->ipv4,
                    'user_agent' => $faker->userAgent,
                ]
            );
        }
    }
}
