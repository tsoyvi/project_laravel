@extends('layouts.admin')

@section('header')
<h1 class="h2">Редактировать категорию</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')

@include('includes.messages')

<form action="{{route('admin.categories.update',  ['category' => $category] ) }}" method="post">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="title">Наименование</label>
        <input type="text" class="form-control" name="title" id="title" value="{{$category->title}}">
    </div>
    <div class="form-group">
        <label>Описание</label>
        <textarea name="description" id="description" class="form-control">{{$category->description}}</textarea>

    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
    <hr>
<div class="form-group">
    <h3>Список новостей в категории</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    Заголовок
                </th>
                <th>
                    Автор
                </th>
                <th>
                    Статус
                </th>
                <th>
                    Дата добавления
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categoryNews as $news)
            <tr>
                <td>
                    {{ $news->title}}
                </td>
                <td>
                    {{ $news->author}}
                </td>
                <td>
                    {{ $news->status}}
                </td>
                <td>
                    {{ date_format($news->created_at, 'd-M-Y') }}
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="4">
                    Пока нет новостей в категории
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>


@endsection


<script>
    window.onload = function() {
    
      ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
     } );

  };
</script>