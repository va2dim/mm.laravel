<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //public $name;
    //public $content;
    protected $fillable = ['name', 'content', 'file'];
    protected $hidden = ['category_id'];
    public $timestamps = false;

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
