<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        $faker = Faker\Factory::create('ru_RU');
        $categoryIds = \App\Category::all()->pluck('id')->toArray();
        exec('mkdir '.public_path('files'));
        foreach (range(1, 12) as $index) {
            $post_id = DB::table('posts')->insertGetId(
                [
                    'category_id' => array_rand($categoryIds),
                    'name' => $faker->unique()->realText(70),
                    'content' => $faker->realText(200),
                    'file' => serialize($faker->file(public_path('files4seeding'), public_path('files'), false))
                ]
            );

            $comment = $faker->realText(200);
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
                    'item_id' => $post_id,
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
