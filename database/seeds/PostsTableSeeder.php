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
        //\App\Post::truncate();
        DB::table('posts')->truncate();

        $faker = Faker\Factory::create('en_EN');
        //$name = $faker->realText(100);
        //$content = $faker->sentence(100);
        //$file = $faker->file('http://lorempixel.com/800/600/cats/', , false);
        $categoryIds = \App\Category::all()->pluck('id')->toArray();

        foreach (range(1, 12) as $index) {
            $post_id = DB::table('posts')->insertGetId(
                [
                    'category_id' => array_rand($categoryIds),
                    'name' => $faker->unique()->realText(70),
                    'content' => $faker->sentence(100),
                    //'file' => $faker->file('/resources/assets/files4seeding', '/resources/assets/uploadedFiles')
                ]
            );

            $author = $faker->firstName.' '.$faker->lastName;
            $content = $faker->sentence(15);
            $year = rand(2009, 2017);
            $month = rand(1, 12);
            $day = rand(1, 28);
            $hour = rand(1, 24);
            $minute = rand(1, 60);
            $second = rand(1, 60);
            $dt = \Carbon\Carbon::create($year, $month, $day, $hour, $minute, $second);
            DB::table('comments')->insert(
                [
                    'post_id' => $post_id,
                    'author' => $author,
                    'content' => $content,
                    'created_at' => $dt,
                ]
            );
        }
    }
}
