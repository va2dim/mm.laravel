@extends('layouts.master')

@section('content')

    <h2>
        @if(!empty($category->id))
            Обновить
        @else
            Создать
        @endif
        категорию</h2>

    <form action="/categories" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>

        @include('layouts.errors')

            <div class="form-group">

                <label for="id" class="col-lg-2 hidden control-label">ID</label>
                <div class="col-lg-12">
                    <input class="form-control" hidden readonly type="number" id="id" name="id" placeholder="ID категории"
                           value="{{ $category->id }}">
                </div>

                <label for="title" class="col-lg-2 control-label">Заголовок</label>
                <div class="col-lg-10">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Краткий заголовок"
                           value="{{ $category->name }}">
                </div>

                <label for="body" class="col-lg-2 control-label">Описание</label>
                <div class="col-lg-10">
                    <textarea rows="8" class="form-control" id="description" name="description"
                              placeholder="Описание категории">{{ $category->description }}</textarea>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cбросить</button>
                        <button type="submit" class="btn btn-primary">
                            @if(!empty($category->id))
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