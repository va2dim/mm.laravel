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
        $faker = Faker\Factory::create('en_EN');

        foreach (range(1, 15) as $index) {
            $post_id = DB::table('users')->insertGetId(
                [
                    'ip' => $faker->ipv4,
                    'user_agent' => $faker->userAgent,
                ]
            );
        }
    }
}
