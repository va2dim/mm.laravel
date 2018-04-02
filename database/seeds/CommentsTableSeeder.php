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
        $tags_rand = rand(0, 6);
        $post_tags = \App\Tag::inRandomOrder()->pluck('id');
        foreach (range(0, $tags_rand) as $i) {
            DB::table('post_tag')->insert(
                [
                    'post_id' => $post_id,
                    'tag_id' => $post_tags[$i],
                ]
            );
        }
    }
}
