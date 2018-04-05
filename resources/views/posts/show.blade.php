@extends('layouts.master')

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->name }}</h2>
        <p class="blog-post-meta d-flex">
        <span class="mr-auto">
            <a href="/posts/{{ $post->id }}/edit"><span class="oi oi-pencil" title="Редактировать" aria-hidden="true"
                                                        aria-label="Редактировать"></span></a>
        </span>
        </p>
        <div>{{ $post->content }}<br>
            @if($post->file)
                <img src="{{ asset('files/'.unserialize($post->file)) }}" height="100">
            @endif
        </div>
    </div><!-- /.blog-post

    include('comments.create') -->

@endsection