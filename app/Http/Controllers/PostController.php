<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'content' => 'required',
                'file' => 'max:2048',
            ]
        );

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            if (isSet($request->id)) {
                if ($oldFile = Post::find($request->id)->file) {
                    $oldFile = unserialize($oldFile);

                    if (file_exists(public_path('files/'.$oldFile))) {
                        unlink(public_path('files/'.$oldFile));
                        Storage::delete(
                            public_path('files/'.$oldFile)
                        );
                    }
                }
            }

            $file_name = $file->getClientOriginalName();
            $file_name = substr($file_name, 0, strpos($file_name, '.', -4));
            $uploadedFile = time().'_'.$file_name.'.'.$file->extension();
            $file->move(public_path('files/'), $uploadedFile);
        } else {
            $uploadedFile = null;
        }

        $post = Post::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'file' => ($uploadedFile) ? serialize($uploadedFile) : null
            ]
        );

        return redirect('/posts/'.$post->id);
    }

    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);
    }

    public function update(Post $post, $category = null)
    {
        $postCategories = $post->categories();
        if (!isSet($post->category_id) && !empty($category)) {
            $post->category_id = $category;
        }

        return view('posts.update', ['post' => $post]);
    }


    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect()->back();
    }
}
