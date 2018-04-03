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

                <label for="title" class="col-lg-2 control-label">Заголовок</label>
                <div class="col-lg-10">
                    <input class="form-control" type="text" id="title" name="title" placeholder="Краткий заголовок"
                           value="{{ $post->name }}">
                </div>

                <label for="body" class="col-lg-2 control-label">Текст</label>
                <div class="col-lg-10">
                    <textarea rows="8" class="form-control" id="body" name="body"
                              placeholder="Полный текст поста">{{ $post->content }}</textarea>
                </div>

                <label for="image" class="col-lg-2 control-label">Картинка</label>
                <div class="col-lg-10">


                    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
                    <!-- Название элемента input определяет имя в массиве $_FILES -->
                    @if($post->file)
                        <img src="{{ asset('images/'.unserialize($post->file)) }}" height="100">
                    @endif


                    <input class="form-control" type="file" accept="image/jpeg,image/png,image/gif" id="images"
                           name="images[]" value="">

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