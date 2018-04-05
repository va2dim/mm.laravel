<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //public $name;
    //public $description;
    protected $fillable = ['name', 'description'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
