<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
