<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Storage;

//use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        $this->validate(
            request(),
            [
                'name' => 'required',
                'content' => 'required',
                'file' => 'max:2048',
            ]
        );


        //TODO Если первый файл прошел валидацию обновить модель
        if (request()->hasFile('file')) {
            $file = request()->file('file');

            if ($oldFile = Post::find(request('id'))->file) {
                $oldFile = unserialize($oldFile);

                if (file_exists(public_path('files/'.$oldFile))) {
                    unlink(public_path('files/'.$oldFile)); // При upload устанавливается simlink?
                    //dd('files/'.$oldFile);
                    Storage::delete(
                        public_path('files/'.$oldFile)
                    ); // TODO не отрабатывает удаление файла, удалить сразу массив imgs, это же добавить в удаление поста
                }
            }

                $file_name = $file->getClientOriginalName();
                $file_name = substr($file_name, 0, strpos($file_name, '.', -4));
                $uploadedFile = time().'_'.$file_name.'.'.$file->extension();
                $file->move(public_path('files/'), $uploadedFile);

            //session()->flash('msg', 'Файлы '.implode(', ', $images).' были успешно загружены');

        } else {
            $uploadedFile = null;
        }

        //dd(($uploadedFile) ? serialize($uploadedFile) : null );

        Post::updateOrCreate(
            [
                'id' => request('id'),
            ],
            [
                'name' => request('name'),
                'content' => request('content'),
                'file' => ($uploadedFile) ? serialize($uploadedFile) : null,
                //'file' => request('file'),
            ]
        );

        return redirect('/posts/'.request('id'));
    }

    public function show(Post $post)
    {
        //$post = Post::where('id', $id)->first();
        //$postCategories = $post->categories();
        //$postComments = $post->getComments();

        return view('posts.show', ['post' => $post]);
    }

    public function update(Post $post)
    {
        //dd($post);

//        $post = Post::where('id', $id)->first();
        $postCategories = $post->categories();
        return view('posts.update', ['post' => $post]);
    }


}
