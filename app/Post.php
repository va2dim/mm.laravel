<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name', 'content', 'file'];
    protected $hidden = ['category_id'];
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
