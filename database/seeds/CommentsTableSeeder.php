<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laravellikecomment_comments')->truncate();

        $faker = Faker\Factory::create('ru_RU');

        $categoryIds = \App\Category::inRandomOrder()->pluck('id');
        foreach (range(0, $categoryIds) as $i) {
            DB::table('laravellikecomment_comments')->insert(
                [
                    'user_id' => 1,
                    'author' => $faker->firstName().' '.$faker->lastName(),
                    'item_id' => $categoryIds[$i],
                    'parent_id' => 0,
                    'comment' => $faker->sentence(20),
                    'content' => $faker->sentence(20),
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime()
                ]
            );

            $postIds = \App\Post::inRandomOrder()->pluck('id');
            foreach (range(0, $postIds) as $i) {
                DB::table('comment')->insert(
                    [
                        'user_id' => 1,
                        'author' => $faker->firstName().' '.$faker->lastName(),
                        'item_id' => $postIds[$i],
                        'parent_id' => 0,
                        'comment' => $faker->sentence(20),
                        'content' => $faker->sentence(20),
                        'created_at' => $faker->dateTime(),
                        'updated_at' => $faker->dateTime()
                    ]
                );
            }
        }
    }
}
