<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*
    public $post_id;
    public $category_id;
    public $author;
    public $content;
*/
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
