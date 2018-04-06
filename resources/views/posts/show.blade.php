@extends('layouts.master')

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->name }}</h2>
        <p class="blog-post-meta d-flex">
        <span class="mr-auto">
            <a href="/posts/{{ $post->id }}/edit"><span class="oi oi-pencil" title="Редактировать" aria-hidden="true"
                                                        aria-label="Редактировать"></span></a>
            <a href="/posts/{{ $post->id }}/delete"><span class="oi oi-delete" title="Удалить" aria-hidden="true"
                                                        aria-label="Удалить"></span></a>
        </span>
        </p>
        <div>{{ $post->content }}<br>
            @if($post->file)
                <img src="{{ asset('files/'.unserialize($post->file)) }}" height="100">
            @endif
        </div>
        <div>
            <br>
                @include('laravelLikeComment::comment', ['comment_item_id' => $post->id])
        </div>
    </div>

@endsection