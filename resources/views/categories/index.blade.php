@extends ('layouts.master')

@section ('content')
    <div class="blog-post">
        <h2 class="blog-post-title">Категории (комментариев/постов):</h2>
        @foreach($categories as $category)
            <div>
                <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                <a href="/categories/{{ $category->id }}/edit"><span class="oi oi-pencil" title="Редактировать"
                                                                     aria-hidden="true"
                                                                     aria-label="Редактировать"></span></a>
                <a href="/categories/{{ $category->id }}/delete"><span class="oi oi-delete" title="Удалить"
                                                                       aria-hidden="true"
                                                                       aria-label="Удалить"></span></a>
                ({{ count(\risul\LaravelLikeComment\Controllers\CommentController::getComments($category->id)) }}
                /{{ $category->posts->count() }})
            </div>
        @endforeach

        <nav class="blog-pagination">
            {{ $categories->links() }}
        </nav>
    </div>
@endsection