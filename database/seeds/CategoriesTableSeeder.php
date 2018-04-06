<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('laravellikecomment_comments')->truncate();

        $faker = Faker\Factory::create('ru_RU');

        foreach (range(1, 10) as $index) {
            $category_id = DB::table('categories')->insertGetId(
                [
                    'name' => $faker->unique()->word,
                    'description' => $faker->realText(200),
                ]
            );

            $comment = $faker->realText(100);
            $year = rand(2009, 2017);
            $month = rand(1, 12);
            $day = rand(1, 28);
            $hour = rand(1, 24);
            $minute = rand(1, 60);
            $second = rand(1, 60);
            $dt = \Carbon\Carbon::create($year, $month, $day, $hour, $minute, $second);

            DB::table('laravellikecomment_comments')->insert(
                [
                    'user_id' => 1,
                    'author' => $faker->firstName.' '.$faker->lastName,
                    'item_id' => $category_id,
                    'parent_id' => 0,
                    'comment' => $comment,
                    'content' => $comment,
                    'created_at' => $dt,
                    'updated_at' => $dt
                ]
            );

        }
    }
}
