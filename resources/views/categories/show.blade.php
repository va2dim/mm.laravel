@extends('layouts.master')

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $category->name }}</h2>
        <p class="blog-post-meta d-flex">
        <span class="mr-auto">
            <a href="/categories/{{ $category->id }}/edit"><span class="oi oi-pencil" title="Редактировать"
                                                                 aria-hidden="true"
                                                                 aria-label="Редактировать"></span></a>
        </span>
        </p>
        <div>{{ $category->description }}<br>
            <hr>
            Комментарии:
            {{ $category->comments }}
            @foreach($category->comments as $comment)
                @include('laravelLikeComment::comment', ['comment_item_id' => $category->id])
            @endforeach
            <hr>
            <ul>Посты:
                @foreach($category->posts as $categoryPost)
                    <li><a href="/posts/{{ $categoryPost->id }}">{{ $categoryPost->name }}</a>
                @endforeach
            </ul>
        </div>
    </div><!-- /.blog-post

sit    include('comments.create') -->

@endsection