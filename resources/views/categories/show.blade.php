@extends('layouts.master')

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $category->name }}</h2>
        <span>
            <a href="/categories/{{ $category->id }}/edit"><span class="oi oi-pencil" title="Редактировать"
                                                                 aria-hidden="true"
                                                                 aria-label="Редактировать"></span></a>
            <a href="/categories/{{ $category->id }}/delete"><span class="oi oi-delete" title="Удалить"
                                                                 aria-hidden="true"
                                                                 aria-label="Удалить"></span></a>
        </span>

        <div>{{ $category->description }}<br>
            <br>
                @include('laravelLikeComment::comment', ['comment_item_id' => $category->id])
            <br>
            <h3>Посты:</h3>
            <p class="blog-post-meta d-flex">
                <span class="mr-auto">
                    <a href="/categories/{{ $category->id }}/posts/create"><span class="oi oi-plus" title="Добавить" aria-hidden="true"
                                                        aria-label="Добавить"></span></a>
                </span>
            </p>
            <ul>
                @foreach($category->posts as $categoryPost)
                    <li><a href="/posts/{{ $categoryPost->id }}">{{ $categoryPost->name }}</a>
                        <span class="mr-auto">
                            <a href="/posts/{{ $categoryPost->id }}/edit"><span class="oi oi-pencil" title="Редактировать"
                                                                 aria-hidden="true"
                                                                 aria-label="Редактировать"></span></a>
                            <a href="/posts/{{ $categoryPost->id }}/delete"><span class="oi oi-delete" title="Удалить"
                                                                   aria-hidden="true"
                                                                   aria-label="Удалить"></span></a>
                        </span>
                @endforeach
            </ul>
        </div>
    </div><!-- /.blog-post -->

@endsection