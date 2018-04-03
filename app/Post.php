<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //public $name;
    //public $content;

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments()
    {
        return $this->comments;
    }
}
