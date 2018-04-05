@extends('layouts.master')

@section('content')

    <h1>
        @if(!empty($post->id))
            Обновить
        @else
            Создать
        @endif
        пост</h1>

    <form action="/posts" method="post" enctype="multipart/form-data">
    {{ csrf_field() }} <!-- Блокировка внешнего ввода данных/ не с этой стр. -->
        <fieldset>

        @include('layouts.errors')

        <!-- <legend>Cоздать пост</legend> -->
            <div class="form-group">
                <label for="id" class="col-lg-2 control-label">ID</label>
                <div class="col-lg-10">
                    <input class="form-control" readonly type="number" id="id" name="id" placeholder="ID поста"
                           value="{{ $post->id }}">
                </div>
                <label for="id" class="col-lg-2 control-label">Category ID</label>
                <div class="col-lg-10">
                    <input class="form-control" readonly type="number" id="categories_id" name="categories_id" placeholder="ID категории поста"
                           value="{{ $post->categories_id }}">
                </div>

                <label for="title" class="col-lg-2 control-label">Заголовок</label>
                <div class="col-lg-10">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Краткий заголовок"
                           value="{{ $post->name }}">
                </div>

                <label for="body" class="col-lg-2 control-label">Текст</label>
                <div class="col-lg-10">
                    <textarea rows="8" class="form-control" id="content" name="content"
                              placeholder="Полный текст поста">{{ $post->content }}</textarea>
                </div>

                <label for="image" class="col-lg-2 control-label">Картинка</label>
                <div class="col-lg-10">

                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
                    @if($post->file)
                        <img src="{{ asset('files/'.unserialize($post->file)) }}" height="100">
                    @endif

                    <input class="form-control" type="file" accept="image/jpeg,image/png,image/gif" id="file" name="file">

                </div>


                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cбросить</button>
                        <button type="submit" class="btn btn-primary">
                            @if(!empty($post->id))
                                Обновить
                            @else
                                Создать
                            @endif
                        </button>
                    </div>
                </div>

            </div>
        </fieldset>
    </form>

@endsection