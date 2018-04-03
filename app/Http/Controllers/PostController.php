<?php

namespace App\Http\Controllers;

use App\Post;

//use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        dd('qq');

        $this->validate(
            request(),
            [
                'name' => 'required',
                'content' => 'required',
                'file' => 'max:2048',
            ]
        );

        Post::updateOrCreate(
            [
                'id' => request('id'),
            ],
            [
                'name' => request('name'),
                'description' => request('description'),
                //'file' => serialize($file),
            ]
        );
    }

    public function show(Post $id)
    {
        //$post = Post::where('id', $id)->first();
        //$postCategories = $post->categories();
        //$postComments = $post->getComments();
        //dd($post->name);

        return view('posts.show', ['post' => $id]);
    }

    public function update(Post $id)
    {
//        $post = Post::where('id', $id)->first();

        return view('posts.update', ['post' => $id]);
    }


}
