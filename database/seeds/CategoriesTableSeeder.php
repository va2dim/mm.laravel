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
        //\App\Post::truncate();
        DB::table('categories')->truncate();
        DB::table('comments')->truncate();

        $faker = Faker\Factory::create('en_EN');
        //$name = $faker->realText(100);
        //$description = $faker->sentence(50);

        foreach (range(1, 10) as $index) {
            $category_id = DB::table('categories')->insertGetId(
                [
                    'name' => $faker->unique()->word,
                    'description' => $faker->sentence(50),
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
                    'category_id' => $category_id,
                    'author' => $author,
                    'content' => $content,
                    'created_at' => $dt,
                ]
            );

        }
    }
}
